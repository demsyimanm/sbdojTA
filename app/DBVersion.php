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
	);


	public function listdb()
	{
		return $this->hasMany('App\ListDB');
	}
}
