<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorsTracker extends Model
{
    use HasFactory;

    protected $table = 'visitors_tracker';

    public $timestamps = false;

    protected $fillable = [
        'ip',
        'user_agent',
        'visited_at'
    ];
}
