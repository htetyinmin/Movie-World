<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'photo', 'genres', 'casts', 'year', 'duration', 'language', 'overview', 'trailer', 'gallery', 'video', 'status'];

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function cast()
    {
        return $this->belongsTo('App\Cast');
    }
}
