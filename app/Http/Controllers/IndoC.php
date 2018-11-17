<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndoC extends Controller
{
	public function __construct() {
		
	}

	public function index(){
		// $a = "select/ambil_data";
		// $b = $_SERVER['REQUEST_URI'];
		// dd($a);
		$data['provinsi']= \App\Models_select::all();
		return view('views_select',$data);
	}

	public function ambil_data(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');

		if($modul=="kabupaten"){
			echo $this->model_select->kabupaten($id);
		}
		else if($modul=="kecamatan"){

		}
		else if($modul=="kelurahan"){
		}
	}

	public function getIndex() {
        $propinsi['propinsi'] = array('' => '');
        foreach(\App\Propinsi::all() as $row)
            $propinsi[$row->id] = $row->propinsi;
         
        return view('index', $propinsi);
    }
     
    public function postData() {
        switch(Input::get('type')):
            case 'kota':
                $return = '<option value=""></option>';
                foreach(Kota::where('propinsi_id', Input::get('id'))->get() as $row) 
                    $return .= "<option value='$row->id'>$row->kota</option>";
                return $return;
            break;
            case 'kecamatan':
                $return = '<option value=""></option>';
                foreach(Kecamatan::where('kota_id', Input::get('id'))->get() as $row) 
                    $return .= "<option value='$row->id'>$row->kecamatan</option>";
                return $return;
            break;
            case 'desa':
                $return = '<option value=""></option>';
                foreach(Desa::where('kecamatan_id', Input::get('id'))->get() as $row) 
                    $return .= "<option value='$row->id'>$row->desa</option>";
                return $return;
            break;
        endswitch;    
    }
}
