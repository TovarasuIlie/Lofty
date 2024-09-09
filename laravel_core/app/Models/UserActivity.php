<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "online_users";

    protected $fillable = [
        'user_id',
        'logged_at'
    ];
}
