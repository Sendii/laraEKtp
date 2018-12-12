@extends('templatesv.nav')
@section('titles')<center>Tambah Warga</center>
@endsection
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<center>Tambah Data Warga</center>
		</div>
		<div class="panel-body">
		<form method="POST" action="{{url('warga')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label class="col-sm-1 control-label">Nama Lengkap</label>
				<div class="col-sm-3">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input placeholder="Nama Lengkap" type="text"  class="form-control" name="nama" required>
					</div>
				</div>
				<label class="col-sm-1 control-label">NIK</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input placeholder="NIK" type="number" class="form-control"  name="nik" required>
					</div>
				</div>
				<label class="col-sm-1 control-label">Agama</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input placeholder="Agama" type="text" class="form-control"  name="agama" required>
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
								<option value="{{ $kota->id }}">{{$kota->name}}</option>
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
						<input placeholder="Tanggal Lahir" type="text" class="form-control"  name="tgl_lahir" id="ttl_datepicker" autocomplete="off" required>
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
							<option value="Menikah">Menikah</option>
							<option value="Belum Menikah">Belum Menikah</option>
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
							<option value="P">Perempuan</option>
							<option value="L">Laki-Laki</option>
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
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
								<option value="O">O</option>
							</select>
					</div>
				</div>
				<label class="col-sm-1 control-label">Pekerjaan </label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input placeholder="Pekerjaan" type="text" class="form-control"  name="pekerjaan" required>
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
						<input placeholder="Nama Jalan" type="text"  class="form-control" name="alamatjalan" required>
					</div>
				</div>
				<label class="col-sm-1 control-label">RT</label>
				<div class="col-sm-2">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input placeholder="RT" type="number" class="form-control"  name="alamatrt" required>
					</div>
				</div>
				<label class="col-sm-1 control-label">RW</label>
				<div class="col-sm-2">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input placeholder="RW" type="number" class="form-control"  name="alamatrw" required>
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
							</select>
					</div>
				</div>
				<label class="col-sm-1 control-label">Kota</label>
				<div class="col-sm-3">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
							<select name="tempat" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true" required>
								<option value="">PILIH KOTA</option>
								@foreach($kotas as $kota)
								<option value="{{ $kota->id }}">{{$kota->name}}</option>
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
								<option value="{{ $kecamatan->id }}">{{$kecamatan->name}}</option>
								@endforeach
							</select>
					</div>
				</div>
			</div>
			<br><hr>
			<div class="form-group">
				<label class="col-sm-1 control-label">Foto KTP</label>
				<div class="col-sm-3">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input placeholder="Nama Lengkap" type="file"  class="form-control" name="foto_warga" required>
					</div>
				</div>
				<label class="col-sm-1 control-label">Foto Tanda Tangan</label>
				<div class="col-sm-3">
					<div class="input-group text">
						<div class="input-group-addon">
							<i class="fa fa-deviantart"></i>
						</div>
						<input placeholder="NIK" type="file" class="form-control"  name="foto_ttd" required>
					</div>
				</div>
			</div>
			<a href="{{url('signatures')}}" target="_blank">Click here to create your signature.</a>
			<br><br><br><br>
			<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i> Tambah Data</button>
		</form>
	</div>
	</div>
@endsection