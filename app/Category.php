<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

	protected $table = 'category';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'name',
		'detail',
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function tutorial()
	{
		return $this->hasMany('App\Tutorial');
	}
}
