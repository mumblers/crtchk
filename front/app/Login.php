<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Login
 *
 * @property string $id
 * @property string $user_id
 * @property string $ip
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Login whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Login whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Login whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Login whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Login whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Login extends Model
{
    use UuidForKey;
    
    protected $fillable = [
        'user_id', 'ip',
    ];
}
