<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'type',
        'author_name',
        'year'
    ];
}