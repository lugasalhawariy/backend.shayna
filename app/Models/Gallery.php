<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'photo',
        'is_default'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
