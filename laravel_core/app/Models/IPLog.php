<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPLog extends Model
{
    use HasFactory;
    public $timestamps = false;

    public $table = 'ip_logs';

    protected $fillable = [
        'user_id',
        'ip'
    ];
}
