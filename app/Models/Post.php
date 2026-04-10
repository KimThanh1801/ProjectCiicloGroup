<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

#[Table('posts')]
#[Fillable('description', 'user_id', 'media_url', 'created_at', 'updated_at')] class Post extends Model
{
    use HasUuids;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


