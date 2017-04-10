<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmissionTutorial extends Model
{
    use SoftDeletes;

	protected $table = 'submissiontutorial';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'tutorial_id',
		'users_id',
		'nilai',
		'jawaban',
		'status'
	);

	protected $SoftDelete = true;
	protected $dates = ['deleted_at'];

	public function tutorial()
	{
		return $this->belongsTo('App\Tutorial');
	}

	public function users()
	{
		return $this->belongsTo('App\User');
	}	
}
