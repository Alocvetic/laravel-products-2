<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $author
 * @property int $rating
 * @property int $product_id
 * @property string $text
 * @property string $created_at
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'rating',
        'product_id',
        'text',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
