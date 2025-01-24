<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'rating', 'user_id', 'product_id'];

    // Relationship with User (if the review is associated with a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Product (if the review is associated with a product)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
