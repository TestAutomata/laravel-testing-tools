<?php

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Commentable;

    protected $table = 'posts';
    protected $fillable = ['title'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function createComment(array $comment)
    {
        return $this->comments()->create($comment);
    }
}
