<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moviedownload extends Model
{
    protected $fillable = ['date', 'user_id', 'movie_id'];

    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
