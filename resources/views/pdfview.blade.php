
<html>
<body>
<table>
<tr>
<td>Nama Depan</td>
<td>Nama Belakang</td>
<td>Jenis Kelamin</td>
<td>Tanggal Lahir</td>
<td>Email</td>
<td>Pendidikan terakhir</td>
<td>Alamat</td>
<td>No ktp</td>
<td>No Telpon</td>

@foreach($Users as $key=>$item)
			@if($key->last_name!="Admin")	
                
                <tr>
				
					<td>{!!$item->first_name!!}</td>
                    <td>{!!$item->last_name!!}</td>
					<td>{!!$item->jenis_kelamin!!}</td>
                    <td>{!!$item->tanggal_lahir!!}</td>
					<td>{!!$item->email!!}</td>
                    <td>{!!$item->Pendidikan!!}</td>
                    <td>{!!$item->alamat!!}</td>
                    <td>{!!$item->no_ktp!!}</td>
                    <td>{!!$item->no_telpon!!}</td>
					
                </tr>
                @endif
                @endforeach
				</table>
                </body>
</html>
