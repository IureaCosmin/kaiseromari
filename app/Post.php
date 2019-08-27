<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\File;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function files(){
        return $this->hasMany(File::class);
    }
}
