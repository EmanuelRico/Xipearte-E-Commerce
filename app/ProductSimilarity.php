<?php declare(strict_types=1);

namespace App;
use App\Suggestions;
use Exception;


class ProductSimilarity
{
    protected $products       = [];
    protected $featureWeight  = 0.5;
    protected $priceWeight    = 0.2;
    protected $categoryWeight = 1;
    protected $priceHighRange = 1000;

    public function __construct(array $products)
    {
        $this->products       = $products;
        $this->priceHighRange = max(array_column($products, 'price'));
    }

    public function setFeatureWeight(float $weight): void
    {
        $this->featureWeight = $weight;
    }

    public function setPriceWeight(float $weight): void
    {
        $this->priceWeight = $weight;
    }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->products as $product) {

            $similarityScores = [];

            foreach ($this->products as $_product) {
                if ($product->id === $_product->id) {
                    continue;
                }
                $similarityScores['product_id_' . $_product->id] = $this->calculateSimilarityScore($product, $_product);
            }
            $matrix['product_id_' . $product->id] = $similarityScores;
        }
        return $matrix;
    }

    public function getProductsSortedBySimularity(int $productId, array $matrix): array
    {
        $similarities   = $matrix['product_id_' . $productId] ?? null;
        $sortedProducts = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find product with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $productIdKey => $similarity) {
            $id       = intval(str_replace('product_id_', '', $productIdKey));
            $products = array_filter($this->products, function ($product) use ($id) { return $product->id === $id; });
            if (! count($products)) {
                continue;
            }
            $product = $products[array_keys($products)[0]];
            $product->similarity = $similarity;
            $sortedProducts[] = $product;
        }
        return $sortedProducts;
    }

    protected function calculateSimilarityScore($productA, $productB)
    {
        // $productAFeatures = implode('', get_object_vars($productA->origin));
        // $productBFeatures = implode('', get_object_vars($productB->origin));

        return array_sum([
            ($this->hamming($productA->origin, $productB->origin) * $this->featureWeight),
            ($this->euclidean(
                $this->minMaxNorm([$productA->price], 0, $this->priceHighRange),
                $this->minMaxNorm([$productB->price], 0, $this->priceHighRange)
            ) * $this->priceWeight),
            ($this->jaccard($productA->category, $productB->category) * $this->categoryWeight)
        ]) / ($this->featureWeight + $this->priceWeight + $this->categoryWeight);
    }

    public static function hamming(string $string1, string $string2, bool $returnDistance = false): float
    {
        $a        = str_pad($string1, strlen($string2) - strlen($string1), ' ');
        $b        = str_pad($string2, strlen($string1) - strlen($string2), ' ');
        $distance = count(array_diff_assoc(str_split($a), str_split($b)));

        if ($returnDistance) {
            return $distance;
        }
        return (strlen($a) - $distance) / strlen($a);
    }

    public static function euclidean(array $array1, array $array2, bool $returnDistance = false): float
    {
        $a   = $array1;
        $b   = $array2;
        $set = [];

        foreach ($a as $index => $value) {
            $set[] = $value - $b[$index] ?? 0;
        }

        $distance = sqrt(array_sum(array_map(function ($x) { return pow($x, 2); }, $set)));

        if ($returnDistance) {
            return $distance;
        }
        // doesn't work well with distances larger than 1
        // return 1 / (1 + $distance);
        // so we'll use angular similarity instead
        return 1 - $distance;
    }

    public static function jaccard(string $string1, string $string2, string $separator = ','): float
    {
        $a            = explode($separator, $string1);
        $b            = explode($separator, $string2);
        $intersection = array_unique(array_intersect($a, $b));
        $union        = array_unique(array_merge($a, $b));

        return count($intersection) / count($union);
    }

    public static function minMaxNorm(array $values, $min = null, $max = null): array
    {
        $norm = [];
        $min  = $min ?? min($values);
        $max  = $max ?? max($values);

        foreach ($values as $value) {
            $numerator   = $value - $min;
            $denominator = $max - $min;
            $minMaxNorm  = $numerator / $denominator;
            $norm[]      = $minMaxNorm;
        }
        return $norm;
    }
}