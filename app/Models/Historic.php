<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    protected $fillable = [
        ' type', 'amount', 'total_before',
        'total_after', 'user_id_tansaction' ,'date',
    ];
}
