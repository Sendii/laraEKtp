<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Warga extends Model
{
    public function Provinsi() {
    	return $this->belongsTo('App\Model\Province', 'alamatprovinsi', 'id');
    }

    public function Kecamatan() {
    	return $this->belongsTo('App\Model\District', 'alamatkecamatan', 'id');
    }
}
