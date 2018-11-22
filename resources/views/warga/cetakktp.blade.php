<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		p {color: #000099; font-family: verdana;}
		body {background-color: #fff;}
		table {margin: 0 auto; width: 50%; border-collapse: collapse; background: #ecf3eb;}
		th, td {border: 1px solid #999;}
		th {padding: 10px 0; background: #0cf; font-size: 25px;}
		td {padding: 2px 2px;}
		p {margin-right: 40px;}
	</style>
</head>
<body>
	<table align="center">
		<tr>
			<th height="50" colspan="2"><center>PROVINSI {{$wargas->Provinsi->name}}</center><center>{{$wargas->Kota->name}}</center></th>
		</tr>
		<tr>
			<td>
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
				<p><blockquote><pre>
					NIK               : {{ $wargas->nik }}
					Nama              : {{ $wargas->nama }}
					Tempat/Tgl Lahir  : {{ str_limit($kotas,19) }}/{{ $wargas->tgl_lahir }}
					Jenis Kelamin     : {{ $wargas->jenkel }}     Gol. Darah : {{ $wargas->gol_dar }}
					Alamat            : {{ $wargas->alamatjalan }}
						RT/RW            : {{ $wargas->alamatrt.'/'.$wargas->alamatrw }}
						Provinsi         : {{ str_limit($provinsi, 7) }}
						Kecamatan        : {{ str_limit($kecamatan, 7) }}
					Agama             : {{ $wargas->agama }}
					Status Perkawinan : {{ $wargas->status }}
					Pekerjaan         : {{ $wargas->pekerjaan }}
					Kewarganegaraan   : {{ $wargas->kewarganegaraan }}
					Berlaku Hingga    : {{ $wargas->berlakuhingga }}
				</pre></blockquote></p>
			</td>
			<td>
				<blockquote>
					<?php 
					$image_path = '/images/$wargas->foto_warga';
					 ?>
					<img src="{{public_path('/warga_image/'.$wargas->foto_warga)}}" alt="..." height="150" width="90" style="margin-top: 10px;">
					<center><h7>{{$kotas}}</h7></center>
					<center><h7>{{date('d-m-Y', strtotime($wargas->created_at))}}</h7></center>
					<center><img src="{{public_path('/warga_image/'.$wargas->foto_ttd)}}" alt="..." height="40" width="60"></center>
				</td>
				</blockquote>
			</td>
		</tr>
	</table>
</body>
</html>