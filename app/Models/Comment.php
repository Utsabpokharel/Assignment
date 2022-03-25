<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function commentor()
    {
        return $this->belongsTo('App\Models\User', 'comment_by');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question');
    }
}
