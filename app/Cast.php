<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cast extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'photo', 'gender', 'dob', 'pob', 'bio', 'gallery', 'status'];

    public function movies()
    {
        return $this->belongsToMany('App\Movie')->withTimestamps();
    }
}
