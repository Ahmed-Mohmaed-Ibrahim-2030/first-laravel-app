<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_rates extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'rate',
        'comment'
    ];
}
