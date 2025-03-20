<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name'
    ];

    public function products():HasMany
    {
        return $this->hasMany(Products::class, 'id');
    }
}
