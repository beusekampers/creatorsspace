<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikedPost extends Model
{
    protected $table = 'liked_posts';

    protected $fillable = ['user_id', 'post_id'];

    public function toggle()
    {
        if($this->exists){
            return $this->delete();
        }

        return $this->save();
    }
}
