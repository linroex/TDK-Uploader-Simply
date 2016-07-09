<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueDetail extends Model {

	protected $table = 'issue_detail';
	protected $guarded = ['id'];
	public $timestamps = false;

}
