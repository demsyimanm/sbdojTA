<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DBVersion extends Model
{
    protected $table = 'dbversion';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'nama',
		'import'
	);


	public function listdb()
	{
		return $this->hasMany('App\ListDB');
	}

	public function dbversionparameter()
	{
		return $this->hasMany('App\DBVersionParameter','dbversion_id', 'id');
	}

	public function listdbparameter()
	{
		return $this->hasMany('App\ListDBParameter');
	}
}
