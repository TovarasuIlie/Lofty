<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateAccountLink extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token',
        'generated_by',
        'expiration_at'
    ];

    public static function verifyEmail($email, $token) {
        if(DB::table('create_account_links')->where('email', $email)->where('token', $token)->where('expiration_at', '>=', 'CURRENT_TIMESTAMP()')->first()) {
            DB::table('create_account_links')->where('email', $email)->where('token', $token)->update(['visited_link' => 1]);
            return true;
        }
        return false;
    }

    public static function deleteToken($email, $token) {
        DB::table('create_account_links')->where('email', $email)->where('token', $token)->where('visited_link', 1)->delete();
    }
}
