@extends('templatesv.nav')
@section('titles')<center>Edit Warga</center>
@endsection
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<center>Edit Data <i>{{$wargas->nama}}</i></center>
	</div>
	<div class="panel-body">
	<form method="POST" action="{{route('warga.update', $wargas->id)}}">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label class="col-sm-1 control-label">Nama Lengkap</label>
			<div class="col-sm-3">
				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input value="{{$wargas->nama}}" placeholder="Nama Lengkap" type="text"  class="form-control" name="nama">
				</div>
			</div>
			<label class="col-sm-1 control-label">NIK</label>
			<div class="col-sm-3">
				<div class="input-group text">
					<div class="input-group-addon">
						<i class="fa fa-deviantart"></i>
					</div>
					<input value="{{$wargas->nik}}" placeholder="NIK" type="number" class="form-control"  name="nik">
				</div>
			</div>
			<label class="col-sm-1 control-label">Agama</label>
			<div class="col-sm-3">
				<div class="input-group text">
					<div class="input-group-addon">
						<i class="fa fa-deviantart"></i>
					</div>
					<input value="{{$wargas->agama}}" placeholder="Agama" type="text" class="form-control"  name="agama">
				</div>
			</div>
		</div>
		<br><hr>
		<div class="form-group">
			<label class="col-sm-1 control-label">Tempat</label>
			<div class="col-sm-3">
				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
						<!-- <select name="tempat" class="form-control select2" style="width: 100px;" tabindex="-1" aria-hidden="true" required>
							<option value=""></option>
						</select> -->
						<select name="tempat" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
							<option value="">PILIH KOTA</option>
							@foreach($kotas as $kota)
							<option value="{{ $kota->id }}" {{$wargas->tempat == $kota->id ? 'selected' : ''}}>{{$kota->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<label class="col-sm-1 control-label">Tanggal Lahir</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input value="{{$wargas->tgl_lahir}}" placeholder="Tanggal Lahir" type="text" class="form-control"  name="tgl_lahir" id="ttl_datepicker" autocomplete="off">
					</div>
				</div>
				<label class="col-sm-1 control-label">Status</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<select name="status" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
							<option value="">Status</option>
							@if($wargas->status == "Menikah")
							<option selected value="Menikah">Menikah</option>
							<option value="Belum Menikah">Belum Menikah</option>
							@endif
							@if($wargas->status == "Belum Menikah")
							<option value="Menikah">Menikah</option>
							<option selected value="Belum Menikah">Belum Menikah</option>
							@endif
						</select>
					</div>
				</div>
			</div>
			<br><hr>
			<div class="form-group">
				<label class="col-sm-1 control-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<select name="jenkel" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
							<option value="">Jenis Kelamin</option>
							@if($wargas->jenkel == "P")
							<option selected value="P">Perempuan</option>
							<option value="L">Laki-Laki</option>
							@endif
							@if($wargas->jenkel == "L")
							<option value="P">Perempuan</option>
							<option selected value="L">Laki-Laki</option>
							@endif
						</select>
					</div>
				</div>
				<label class="col-sm-1 control-label">Golongan Darah</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<select name="gol_dar" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
							<option value="">Pilih Goldar</option>
							@if($wargas->gol_dar == "A")
							<option selected value="A">A</option>
							<option value="B">B</option>
							<option value="AB">AB</option>
							<option value="O">O</option>
							@elseif($wargas->gol_dar == "B")
							<option value="A">A</option>
							<option selected value="B">B</option>
							<option value="AB">AB</option>
							<option value="O">O</option>
							@elseif($wargas->gol_dar == "AB")
							<option value="A">A</option>
							<option value="B">B</option>
							<option selected value="AB">AB</option>
							<option value="O">O</option>
							@elseif($wargas->gol_dar == "O")
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="AB">AB</option>
							<option selected value="O">O</option>
							@endif
						</select>
					</div>
				</div>
				<label class="col-sm-1 control-label">Pekerjaan </label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input value="{{$wargas->pekerjaan}}" placeholder="Pekerjaan" type="text" class="form-control"  name="pekerjaan">
					</div>
				</div>
			</div>
			<br><hr>
			<div class="form-group">
				<label class="col-sm-1 control-label">Jalan</label>
				<div class="col-sm-3">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input value="{{$wargas->alamatjalan}}" placeholder="Nama Jalan" type="text"  class="form-control" name="alamatjalan">
					</div>
				</div>
				<label class="col-sm-1 control-label">RT</label>
				<div class="col-sm-2">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input value="{{$wargas->alamatrt}}" placeholder="RT" type="number" class="form-control"  name="alamatrt">
					</div>
				</div>
				<label class="col-sm-1 control-label">RW</label>
				<div class="col-sm-2">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input value="{{$wargas->alamatrw}}" placeholder="RW" type="number" class="form-control"  name="alamatrw">
					</div>
				</div>
			</div>
			<br><hr>
			<div class="form-group">
				<label class="col-sm-1 control-label">Provinsi</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<select name="provinsi" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
							<option value="">PILIH PROVINSI</option>
							@foreach($provinces as $province)
							<option value="{{ $province->id }}">{{$province->name}}</option>
							@endforeach
							@foreach($provinces as $province)
							<option value="{{ $province->id }}" {{$wargas->alamatprovinsi == $province->id ? 'selected' : ''}}>{{$province->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<label class="col-sm-1 control-label">Kota</label>
				<div class="col-sm-3">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<!-- <select name="tempat" class="form-control select2" style="width: 100px;" tabindex="-1" aria-hidden="true" required>
							<option value=""></option>
						</select> -->
						<select name="alamatkelurahan" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
							<option value="">PILIH KOTA</option>
							@foreach($kotas as $kota)
							<option value="{{ $kota->id }}" {{$wargas->tempat == $kota->id ? 'selected' : ''}}>{{$kota->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<label class="col-sm-1 control-label">Kecamatan</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<select name="alamatkecamatan" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
							<option value="">PILIH KECAMATAN</option>
							@foreach($kecamatans as $kecamatan)
							<option value="{{ $kecamatan->id }}" {{$wargas->alamatkecamatan == $kecamatan->id ? 'selected' : ''}}>{{$kecamatan->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<br><hr>
			<div class="form-group">
				<label class="col-sm-1 control-label">Foto KTP</label>
				<div class="col-sm-4">
					<img src="{{asset('/warga_image/'.$wargas->foto_warga)}}" class="img-responsive">
					<input style="margin-top: 20px;" type="file" name="foto_warga">
				</div>
			</div>
			<label class="col-sm-1 control-label">Foto Tanda Tangan</label>
			<div class="col-sm-4">
				<img src="{{asset('/signature/images/'.$wargas->foto_ttd)}}" class="img-responsive">
				<a href="{{url('signatures')}}" target="_blank">Click here to create your signature.</a>
				<input type="file" name="foto_ttd">
			</div>
			<div>
				<div style="margin-bottom: 220px; margin-right: 40px;"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i> Update Data</button></div>
			</div>
		</div>
	</div>
</form>
</div>
@endsection