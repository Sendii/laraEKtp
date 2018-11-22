<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use PDF;

class WargaC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['wargas'] = \App\Warga::all();
        return view('warga.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['provinces'] = \App\Model\Province::orderBy('name', 'desc')->get();
        $data['kotas'] = \App\Model\Regency::orderBy('name', 'desc')->get();
        $data['kelurahans'] = \App\Model\District::orderBy('name', 'desc')->get();
        $data['kecamatans'] = \App\Model\District::orderBy('name', 'desc')->get();
        return view('warga.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $new = new \App\Warga;

        $new->nik = $request->input('nik');
        $new->nama = $request->input('nama');
        $new->tempat = $request->input('tempat');
        $new->tgl_lahir = $request->input('tgl_lahir');
        $new->jenkel = $request->input('jenkel');
        $new->gol_dar = $request->input('gol_dar');
        $new->alamatjalan = $request->input('alamatjalan');
        $new->alamatrt = $request->input('alamatrt');
        $new->alamatrw = $request->input('alamatrw');
        $new->alamatkelurahan = $request->input('alamatkelurahan');
        $new->alamatkecamatan = $request->input('alamatkecamatan');
        $new->alamatprovinsi = $request->input('provinsi');
        $new->agama = $request->input('agama');
        $new->status = $request->input('status');
        $new->pekerjaan = $request->input('pekerjaan');
        $new->kewarganegaraan = "Indonesia";
        $new->berlakuhingga = "Seumur Hidup";

        if ($request->hasFile('foto_ttd')) {
            $imagettd = $request->file('foto_ttd');
            $filename = time() . '.' . $imagettd->getClientOriginalExtension();
            Image::make($imagettd)->save( public_path('/signature/images/'. $filename ) );
            $new->foto_ttd = $filename;
        }

        if ($request->hasFile('foto_warga')) {
            $imagefoto = $request->file('foto_warga');
            $filenames = time() . '.' . $imagefoto->getClientOriginalExtension();
            Image::make($imagefoto)->save( public_path('/warga_image/'. $filenames ) );
            $new->foto_warga = $filenames;
        }

        $new->save();
        return redirect('warga');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga['provinces'] = \App\Model\Province::orderBy('name', 'desc')->get();
        $warga['kotas'] = \App\Model\Regency::orderBy('name', 'desc')->get();
        $warga['kelurahans'] = \App\Model\District::orderBy('name', 'desc')->get();
        $warga['kecamatans'] = \App\Model\District::orderBy('name', 'desc')->get();
        $warga['wargas'] = \App\Warga::find($id);
        
        return view('warga.edit', $warga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update =  \App\Warga::find($id);

        $update->nik = $request->input('nik');
        $update->nama = $request->input('nama');
        $update->tempat = $request->input('tempat');
        $update->tgl_lahir = $request->input('tgl_lahir');
        $update->jenkel = $request->input('jenkel');
        $update->gol_dar = $request->input('gol_dar');
        $update->alamatjalan = $request->input('alamatjalan');
        $update->alamatrtrw = $request->input('alamatrtrw');
        $update->alamatkelurahan = $request->input('alamatkelurahan');
        $update->alamatkecamatan = $request->input('alamatkecamatan');
        $update->provinsi = $request->input('provinsi');
        $update->agama = $request->input('agama');
        $update->status = $request->input('status');
        $update->pekerjaan = $request->input('pekerjaan');
        $update->kewarganegaraan = $request->input('kewarganegaraan');
        $update->berlakuhingga = $request->input('berlakuhingga');
        $update->foto_warga = $request->input('foto_warga');
        $update->foto_ttd = $request->input('foto_ttd');

        $update->save();
        return redirect('warga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = \App\Warga::find($id);

        $delete->delete();
        return back();
    }

    public function signature() {
        return view('warga.signature');
    }

    public function showWarga($nik){
        $warga['wargas'] = \App\Warga::where('nik', $nik)->first();
        if (isset($warga['wargas'])) {
            $nama = \App\Warga::where('nik', $nik)->value('nama');
            $pdf = PDF::loadView('warga.cetakktp', $warga);
            return $pdf->download($nama.'.pdf');
        }elseif (!isset($warga['wargas']) && filter_var($warga['wargas'], FILTER_VALIDATE_INT) === false) {
            return "data tidak ditemukan";
        }
    } 
}