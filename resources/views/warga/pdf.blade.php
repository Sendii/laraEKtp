<style type="text/css" src="{{public_path('template/vendor/bootstrap/css/bootstrap.min.css')}}"></style>
<center>Data Warga</center>
<table>
	<thead>
		<tr>
			<th>Nik</th>
			<th>Nama</th>
			<th>Tempat/Tgl_lahir</th>
			<th>Jenkel</th>
			<th>Gol_dar</th>
			<th>Alamatjalan</th>
			<th colspan="2"">Letak</th>
			<th>Agama</th>
			<th>Status</th>
			<th>Pekerjaan</th>
			<th>Kewarganegaraan</th>
			<th>Berlakuhingga</th>
			<th>Foto_warga</th>
			<th>Foto_ttd</th>
			@if(Auth::user()->akses == 'admin')
			<th>Action</th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($wargas as $warga)
		<?php 
		$a = strtolower($warga->Provinsi->name);
		$b = strtolower($warga->Kecamatan->name);
		$c = strtolower($warga->Kota->name);
		$provinsi = ucwords($a);
		$kecamatan = ucwords($b);
		$kota = ucwords($c);
		$subject = $kota;
		$kotas =  str_replace("Kota ","", $subject); 
		?>
		<tr align="center">
			<td>
				@if(Auth::user()->akses == 'admin')
				<a target="_blank" href="{{url($warga->nik.'/warga/cetak')}}">
					@endif
					{{ $warga->nik }}</a>
				</td>
				<td>{{ $warga->nama }}</td>
				<td>{{ str_limit($kotas, 19) }}<br>{{$warga->tgl_lahir}}</td>
				<td>
					@if($warga->jenkel == "L")
					Laki-Laki
					@elseif($warga->jenkel == "P")
					Perempuan
					@endif
				</td>
				<td>{{ $warga->gol_dar }}</td>
				<td>{{ $warga->alamatjalan }}</td>
				<td>
					Provinsi <br>
					Kec. <br> 
					RT/RW<br>
				</td>
				<td>
					{{ str_limit($provinsi, 7) }} <br>
					{{ str_limit($kecamatan, 7) }} <br>
					{{ $warga->alamatrt.'/'.$warga->alamatrw }} <br>
				</td>
				<td>{{ $warga->agama }}</td>
				<td>{{ $warga->status }}</td>
				<td>{{ $warga->pekerjaan }}</td>
				<td>{{ $warga->kewarganegaraan }}</td>
				<td>{{ $warga->berlakuhingga }}</td>
				<td><img src="{{public_path('/warga_image/'.$warga->foto_warga)}}" alt="..." class="img-responsive"></td>
				<td><img src="{{public_path('/signature/images/'.$warga->foto_ttd)}}" alt="..." class="img-responsive"></td>
				@if(Auth::user()->akses == 'admin')
				<td>
					<a class="btn btn-info" href="{{url('warga/'.$warga->id.'/edit')}}">edit</a>
					<form action="{{ route('warga.destroy', $warga->id) }}" method="post">
						@method('DELETE')
						@csrf
						<input type="submit" value="delete" onclick="return confirm('apus data ?')">
					</form>
				</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>