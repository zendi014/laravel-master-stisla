<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use SoftDeletes;
use UuidTrait;

class Book extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    protected $table = 'books';

    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'type',
        'author_name',
        'year'
    ];
    // book_name, year, category, stock, isbn, author_id, publisher_id, location_id, rack_id 
}