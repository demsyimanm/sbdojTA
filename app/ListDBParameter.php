<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDBParameter extends Model
{
    protected $table = 'listdbparameter';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'listdb_id',
		'dbversion_id',
		'dbversionparameter_id',
		'content'
	);


	public function dbversion()
	{
		return $this->belongsTo('App\DBVersions');
	}

	public function listdb()
	{
		return $this->belongsTo('App\ListDB');
	}

	public function dbversionparameter()
	{
		return $this->belongsTo('App\DBVersionParameter');
	}
}
