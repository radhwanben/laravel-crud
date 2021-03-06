<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id','photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
