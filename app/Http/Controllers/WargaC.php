<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use App\Model\Province;
use App\Model\District;
use App\Model\Regency;
use \Carbon\Carbon;
use App\Warga;
use App\User;
use Excel;
use Image;
use PDF;
use DB;

class WargaC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['wargas'] = Warga::all();
        // ['wargas'] adalah array untuk kita dipakai saat kita gunakan foreach di file blade nanti
        // all() adalah fungsi untuk menampilkan semua data yang ada didalam Model Warga, Model == tabel
        return view('warga.all', $data);
        //memparsing $data yang berisikan ['warga'] ke file all.blade.php yang berada di (resources/views/warga) untuk pemanggilan foreach dengan array.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['provinces'] = Province::orderBy('name', 'desc')->get();
        // get() adalah fungsi untuk mengambil data setelah data diurutkan
        $data['kotas'] = Regency::orderBy('name', 'desc')->get();
        $data['kelurahans'] = District::orderBy('name', 'desc')->get();
        $data['kecamatans'] = District::orderBy('name', 'desc')->get();
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
        $new = new Warga;

        $now = Carbon::now(); // Tanggal sekarang
        $legal = $request->input('tgl_lahir');
        $tgl = Carbon::parse($legal);
        $cukupumur = $tgl->diffInYears($now);
        if ($cukupumur >= 17 ) {
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
        }elseif ($tgl->diffInYears($now)  <= 17 ) {
            echo "anda belom cukup umur";
        }else{
            echo "ada salaahhhh!!!!";
        }
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
        $warga['provinces'] = Province::orderBy('name', 'desc')->get();
        $warga['kotas'] = Regency::orderBy('name', 'desc')->get();
        $warga['kelurahans'] = District::orderBy('name', 'desc')->get();
        $warga['kecamatans'] = District::orderBy('name', 'desc')->get();
        
        $warga['wargas'] = Warga::find($id);
        dd($warga['wargas']);
        //kalo id warga nya ada, redirect ke form edit warga
        if (isset($warga['wargas'])){
            return view('warga.edit', $warga);
        }else {
            //kalo id warga nya TIDAK ADA, redirect ke page 404
            return view('404');
        }
        
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
        $update =  Warga::find($id);

        $now = Carbon::now(); // Tanggal sekarang
        $legal = $request->input('tgl_lahir');
        $tgl = Carbon::parse($legal);
        $cukupumur = $tgl->diffInYears($now);
        if ($cukupumur >= 17) {          
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
            $update->kewarganegaraan = "Indonesia";
            $update->berlakuhingga = "Seumur Hidup";

            if ($request->hasFile('foto_ttd')) {
                $imagettd = $request->file('foto_ttd');
                $filename = time() . '.' . $imagettd->getClientOriginalExtension();
                Image::make($imagettd)->save( public_path('/signature/images/'. $filename ) );
                $update->foto_ttd = $filename;
            }else{
                echo "ada salah";
            }

            if ($request->hasFile('foto_warga')) {
                $imagefoto = $request->file('foto_warga');
                $filenames = time() . '.' . $imagefoto->getClientOriginalExtension();
                Image::make($imagefoto)->save( public_path('/warga_image/'. $filenames ) );
                $update->foto_warga = $filenames;
            }else{
                echo "ada salah";
            }

            $update->save();
            return redirect('warga');
        }else{
            echo "anda belom cukup umur";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Warga::find($id);

        if (isset($delete)) {
            //kalau idnya ada dia ngehapus datanya
            $delete->delete();
            return back();
        }else{
            //kalau idnya TIDAK ADA
            echo "ada kesalahan";
        }
    }

    public function showWarga($nik){
        $warga['wargas'] = Warga::where('nik', $nik)->first();
        if (isset($warga['wargas'])) {
            //kalau data sesuai
            $nama = Warga::where('nik', $nik)->value('nama'); // where nama, lalu mengambil value nama. value == nama field
            $pdf = PDF::loadView('warga.cetakktp', $warga)->setPaper(array(0,0,630,369))->setWarnings(false); //menampilkannya dengan PDF di file cetakktp didalam folder warga, dan membuat ukuran kertas yg kita butuhkan
            return $pdf->stream($nama.'.pdf');
        }elseif (!isset($warga['wargas'])) {
            //Kalau tidak ada data yang sesuai
            return view('404');
        }
    }

    public function getChart() {
        $perempuan = Warga::where('jenkel', 'P')->get();
        $laki = Warga::where('jenkel', 'L')->get();
        //Chart Perempuan
        $chart['perempuan'] = Charts::database($perempuan, 'donut', 'highcharts')
        ->title(" ")
        ->elementLabel("Total Perempuan")
        ->dimensions(900, 500)
        ->responsive(false)
        ->groupByMonth(date('Y'), true);

        //Chart Laki-Laki
        $chart['laki'] = Charts::database($laki, 'bar', 'highcharts')
        ->title(" ")
        ->elementLabel("Total Laki-Laki")
        ->dimensions(900, 500)
        ->responsive(false)
        ->groupByMonth(date('Y'), true);

        return view('chart', $chart);
    }

    // public function downloadExcel($type)
    // {
    //   $data = Warga::get()->toArray();
    //   return Excel::create('sisawReport', function($excel) use ($data) {
    //     $excel->sheet('mySheet', function($sheet) use ($data)
    //     {
    //       $sheet->fromArray($data);
    //     });
    //   })->download($type);
    // } 
}