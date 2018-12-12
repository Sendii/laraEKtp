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
			<th height="50" colspan="2"><center>PROVINSI DKI JAKARTA</center><center>JAKARTA TIMUR</center></th>
		</tr>
		<tr>
			<td>
				<p><blockquote><pre>
					NIK               : 
					Nama              : 
					Tempat/Tgl Lahir  : 
					Jenis Kelamin     :      
					Alamat            : 
						RT/RW            :  
						Provinsi         : 
						Kecamatan        : 
					Agama             : 
					Status Perkawinan : 
					Pekerjaan         : 
					Kewarganegaraan   : 
					Berlaku Hingga    : 
				</pre></blockquote></p>
			</td>
			<td>
				<blockquote>
					<?php 
					$image_path = '/images/$wargas->foto_warga';
					 ?>
					<img src="{{public_path('/warga_image/')}}" alt="..." height="150" width="90" style="margin-top: 10px;">
					<center><h7>Kota</h7></center>
					<center><h7>Tanggal</h7></center>
					<center><img src="{{public_path('/warga_image/')}}" alt="..." height="40" width="60"></center>
				</td>
				</blockquote>
			</td>
		</tr>
	</table>
</body>
</html>