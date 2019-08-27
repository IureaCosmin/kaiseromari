<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class File extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
