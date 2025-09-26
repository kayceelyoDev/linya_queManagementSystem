<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class queTable extends Model
{
    //
    protected $table = 'que_tables';
    protected $fillable = ['user_id','que_number','status','purpose'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
