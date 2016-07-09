<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model {
    protected $table = 'issues';
    protected $guarded = ['id'];

    public function detail(){
    	return $this->hasMany('App\IssueDetail');
    }
}
