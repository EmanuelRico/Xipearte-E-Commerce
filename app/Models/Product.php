<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products'; 

    /**
     * Get all of the imagenes for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagenes(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    /**
     * Get all of the producto_categoria for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function producto_categoria(): HasMany
    {
        return $this->hasMany(Product_category::class, 'product_id', 'id');
    }

    /**
     * Get the sold_product that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sold_product(): BelongsTo
    {
        return $this->belongsTo(Sold_product::class, 'id', 'product_id');
    }
}
