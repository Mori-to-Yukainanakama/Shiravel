<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // hasManyメソッドは相手が複数あるときに取得できる
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'user_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'user_id');
    }

    public function answerComments()
    {
        return $this->hasMany('App\Models\AnswerComment', 'user_id');
    }

    public function questionComments()
    {
        return $this->hasMany('App\Models\QuestionComment', 'user_id');
    }
}
