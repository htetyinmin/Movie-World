<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'photo', 'year', 'duration', 'language', 'overview', 'trailer', 'gallery', 'video', 'status'];

    public function genres()
    {
        return $this->belongsToMany('App\Genre')->withTimestamps();
    }

    public function casts()
    {
        return $this->belongsToMany('App\Cast')->withTimestamps();
    }
}
