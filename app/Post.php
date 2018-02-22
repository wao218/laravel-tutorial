<?php

namespace App;

class Post extends Model
{
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() { //$post->user

        return $this->belongsTo(User::class);

    }

    public function addComment($body) {
        // Comment::create([

        //     'body' => request('body'),

        //     'post_id' => $this->id

        // ]);

        

        $this->comments()->create(compact('body'));
        
    }

}
