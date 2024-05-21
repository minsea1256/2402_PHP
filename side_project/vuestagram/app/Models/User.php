<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account',
        'name',
        'password',
        'gender',
        'profile',
        'refresh_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'refresh_token',
    ];

    /**
     * TimeZone format when serializing JSON
     *  @return \DateTimeInterface $data
     * 
     * @return String('Y-m-d h:i:s')
     */
    protected function serializeDate(\DateTimeInterface $data)
        {return $data->format('Y-m-d h:i:s');
    }

    /**
     * Accessor : Column gender
     */
    public function getGenderAttribute($value) {
        return $value == '0' ? '남자' : '여자';
    }

    public function boards() {
        // hasMany 한개 사용시
        return $this->hasMany(Board::class);
    }
}
