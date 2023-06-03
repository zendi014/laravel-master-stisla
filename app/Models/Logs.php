<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
use App\Models\Concerns\UuidTrait;

class Logs extends Model
{
    use HasFactory, SoftDeletes, UuidTrait;

    protected $table = 'logs';

    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'current_data',
        'existing_data',
        'created_by'
    ];
}
