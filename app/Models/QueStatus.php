<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueStatus extends Model
{
     protected $table = 'queue_status';
    protected $fillable = ['current_number','window'];
}
