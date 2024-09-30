<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $category
 * @property float $price
 * @property ?string $image
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'price',
        'image',
    ];
}
