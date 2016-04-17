<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use UuidForKey;
    
    protected $fillable = [
        'user_id', 'ip',
    ];
}
