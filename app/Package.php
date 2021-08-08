<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'fees', 'period', 'description'];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
