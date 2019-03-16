<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $table = 'cards';
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
