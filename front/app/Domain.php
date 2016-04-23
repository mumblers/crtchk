<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Domain
 *
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereDeletedAt($value)
 * @mixin \Eloquent
 * @property string $url
 * @property \Carbon\Carbon $verified_at
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain whereVerifiedAt($value)
 */
class Domain extends Model {
	use SoftDeletes, UuidForKey;

	protected $table = 'domains';
	protected $primaryKey = 'id';
	protected $dates = ['verified_at'];
	public $timestamps = true;

	protected $fillable = ['name', 'url', 'verified_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
