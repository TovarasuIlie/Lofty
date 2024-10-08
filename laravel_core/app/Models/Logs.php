<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'logs';

    protected $fillable = [
        'user_id',
        'ip',
        'text'
    ];
}
