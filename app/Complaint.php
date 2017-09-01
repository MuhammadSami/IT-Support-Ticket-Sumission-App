<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //
    protected $table = 'complaint';
    protected $fillable = [
        'user_id','operating_system', 'software_issue', 'location',
    ];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
