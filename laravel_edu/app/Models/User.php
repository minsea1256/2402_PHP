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
    // 해당 모델에서 소프르딜리트를 적용시키고 싶으면 SoftDeletes 트레이트 추가
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // 모델과 이어질 테이블 명을 정의하는 포로퍼티
    // 데이터 테이블 이름이 단수명으로 작성시 protected 프로퍼티를 작성해서 이어준다
    // protected $table = 'users';

    // PK를 지정하는 프로퍼티
    // protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // 화이트리스트와 블랙리스트 둘중에 한개만 지정해서 사용해야 한다
    // upsert시 변경을 허용할 컬럼들 설정하는 프로퍼티, 이것을 "화이트 리스트" 라고 한다
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
    ];
    // upsert시 변경을 비허용할 컬럼들 설정하는 프로퍼티, 이것을 "블랙 리스트" 라고 한다
    // protected $guarded = [
    //     'id'
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
