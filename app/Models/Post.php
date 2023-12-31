<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'categories_id',
        'is_headline',
        'status',
        'content',
    ];

    public static $rules = [
        'title'          => 'required',
        'thumbnail'     => 'required',
        'categories_id' => 'required',
        'is_headline'   => 'required',
        'status'        => 'required',
        'content'       => 'required'
    ];

    public function category()
    {
        // foreign key categories_id berelasi dengan tabel categories
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

}
