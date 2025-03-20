<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Products extends Model
{
    use SoftDeletes, Prunable;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'description'
    ];
    public function categories():BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function orders():HasMany
    {
        return $this->hasMany(Orders::class, 'id');
    }
}
