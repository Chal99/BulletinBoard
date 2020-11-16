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

    /**
     * Create relationship with user and post
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'create_user_id');
    }
}
