<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DBVersionParameter extends Model
{
    protected $table = 'dbversionparameter';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'dbversion_id',
		'parameter'
	);


	public function dbversion()
	{
		return $this->belongsTo('App\DBVersion','id','dbversion_id');
	}

	public function listdbparameter()
	{
		return $this->hasMany('App\ListDBParameter');
	}
}
