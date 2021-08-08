<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $fillable = ['date', 'user_id', 'package_id'];

    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
