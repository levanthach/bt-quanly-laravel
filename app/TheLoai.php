<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
	protected $table = 'the_loai';
	public function book() {
		return $this->hasMany('App\Sach', 'id_theloai','id');
	}
}
