<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	p {color: #000099; font-family: verdana;}
	body {background-color: #fff;}
	table {margin: 0 auto; width: 40%; border-collapse: collapse;}
	th, td {border: 1px solid #000;}
	th {padding: 5px 0; font-size: 33px;}
	td {padding: 2px 2px;}
	p {margin-right: 40px;}
</style>
</head>
<body>
	<?php 
	$a = strtolower($wargas->Provinsi->name);
	$b = strtolower($wargas->Kecamatan->name);
	$c = strtolower($wargas->Kota->name);
	$provinsi = ucwords($a);
	$kecamatan = ucwords($b);
	$kota = ucwords($c);
	$subject = $kota;
	$kotas =  str_replace("Kota ","", $subject); 
	?>
	<div>
		<table>
			<tr>
				<th height="50" colspan="2"><center>Provinsi {{$provinsi}}</center><center>{{$kota}}</center></th>
			</tr>
			<tr>
				<td>
					<p><blockquote><pre>
						NIK               : {{ $wargas->nik }}
						Nama              : {{ $wargas->nama }}&nbsp;
						Tempat/Tgl Lahir  : {{ $kotas }}/{{ $wargas->tgl_lahir }}&nbsp;
						Jenis Kelamin     : {{ $wargas->jenkel }}     Gol. Darah : {{ $wargas->gol_dar }} &nbsp;
						Alamat            : {{ $wargas->alamatjalan }}
						  RT/RW           : {{ $wargas->alamatrt.'/'.$wargas->alamatrw }}
						  Provinsi        : {{ $provinsi }}
						  Kecamatan       : {{ $kecamatan }}
						Agama             : {{ $wargas->agama }}
						Status Perkawinan : {{ $wargas->status }}
						Pekerjaan         : {{ $wargas->pekerjaan }}
						Kewarganegaraan   : {{ $wargas->kewarganegaraan }}
						Berlaku Hingga    : {{ $wargas->berlakuhingga }}
					</pre></blockquote></p>
				</td>
				<td>
					<blockquote>
						<center><img src="{{public_path('/warga_image/'.$wargas->foto_warga)}}" alt="..." height="165" width="150" style="margin-top: -5px; margin-left: -10px;"></center>
						<center><h7>{{$kotas}}</h7></center>
						<center><h7>{{date('d-m-Y', strtotime($wargas->created_at))}}</h7></center>
						<center><img src="{{public_path('/signature/images/'.$wargas->foto_ttd)}}" alt="..." height="55" width="90"></center>
					</td>
				</blockquote>
			</td>
		</tr>
	</table>
</div>
</body>
</html>