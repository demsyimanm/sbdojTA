<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListDB extends Model
{
    use SoftDeletes;

	protected $table = 'listdb';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'ip',
		'db_username',
		'db_password',
		'db_name',
		'status',
		'dbversion_id'
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function event()
	{
		return $this->hasMany('App\Event');
	}

	public function dbversion()
	{
		return $this->belongsTo('App\DBVersion');
	}
}
