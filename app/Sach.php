<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
	protected $table = "sach";
	public function cate() {
		return $this->belongsTo('App\TheLoai','id_theloai','id');
	}
}
