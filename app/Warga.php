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

    public function Kota() {
    	return $this->belongsTo('App\Model\Regency', 'tempat', 'id');
    }
}

// php artisan migrate
// php artisan db:seed --class=IndoRegionProvinceSeeder      # Import data provinsi
// php artisan db:seed --class=IndoRegionRegencySeeder       # Import data kota/kabupaten
// php artisan db:seed --class=IndoRegionDistrictSeeder      # Import data kecamatan/distrik
// php artisan db:seed --class=IndoRegionVillageSeeder       # Import data desa/kelurahan
