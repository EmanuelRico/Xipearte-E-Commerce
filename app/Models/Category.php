<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    /**
     * Get all of the prodcut_categori for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function producto_categoria(): HasMany
    {
        return $this->hasMany(Product_category::class, 'category_id', 'id');
    }
}
