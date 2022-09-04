<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales'; 

    /**
     * Get the user associated with the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get all of the sold_product for the Sale
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sold_product(): HasMany
    {
        return $this->hasMany(Sold_product::class, 'sale_id', 'id');
    }
    
}
