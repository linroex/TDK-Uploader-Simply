<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {
	protected $table = 'uploads';
    protected $guarded = ['id'];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
