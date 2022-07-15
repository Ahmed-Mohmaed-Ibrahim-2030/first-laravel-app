<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

public function Category ()
{
    return $this->belongsTo( Book::class, 'category_id');
}

    protected $fillable = [
        'id',
        'title',
        'description',
        'category_id',
        'price',
        'image'
    ];

}

