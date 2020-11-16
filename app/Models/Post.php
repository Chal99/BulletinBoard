<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'create_user_id', 'updated_user_id', 'deleted_user_id', 'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function post_user()
    {
        $user_name = User::where('id', $this->create_user_id)->first()->name;
        return $user_name;
    }
}
