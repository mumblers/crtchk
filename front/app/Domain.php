<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domain extends Model {
	use SoftDeletes, UuidForKey;

	protected $table = 'domains';
	protected $primaryKey = 'id';
	public $timestamps = true;

	protected $fillable = ['name'];

	/**
	 * @return \Illuminate\Database\Query\Builder
	 */
	public function domains(){
		return $this->hasMany('App\Domain', 'user_id', 'id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function leerling(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
