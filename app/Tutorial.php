<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorial extends Model
{
    use SoftDeletes;

	protected $table = 'tutorial';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'category_id',
		'eventtutorial_id',
		'judul',
		'konten',
		'jawaban'
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function eventtutorial()
	{
		return $this->belongsTo('App\EventTutorial');
	}
}
