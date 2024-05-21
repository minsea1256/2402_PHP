<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'content',
        'img',
        'like',
    ];

    /**
     * TimeZone format when serializing JSON
     * 
     *  @return \DateTimeInterface $data
     * 
     * @return String('Y-m-d h:i:s')
     */
    protected function serializeDate(\DateTimeInterface $data)
        {return $data->format('Y-m-d h:i:s');
    }

    public function users() {
        // belongsTo : 다관계쪽 사용
        return $this->belongsTo(User::class);
    }
}
