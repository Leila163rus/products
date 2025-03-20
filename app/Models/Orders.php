<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Products;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_id',
        'quantity',
        'customer',
        'comment',
        'status'
    ];
    protected $attributes = [
        'status' => 'new'
    ];

    public function products():BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id')->withTrashed();
    }
}
