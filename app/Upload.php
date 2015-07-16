<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {
	protected $table = 'uploads';
    protected $guarded = ['id'];
    protected $appends = ['count'];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getCountAttribute() {
        return $this->attributes['count'] = $this->where('issue_id', '=', $this->issue_id)->where('user_id', '=', $this->user_id)->count();
    }
}
