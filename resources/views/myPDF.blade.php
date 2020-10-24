<!DOCTYPE html>

<html>

<head>

<title>Siswa</title>

</head>

<body>

   <center> <h1>{{ $title }}</h1></center>

    <p>{{ $date }}</p>

    <table border="1" width="100%">
	<tbody>
		<tr>
        <td>No.</td>    
        <td>Nama</td>
			<td>Nilai</td>
        </tr>
        @php
        $num=0;
        @endphp
        @foreach($answerer as $ans)
		<tr>
            @php
            $num++; 
            @endphp
			<td>{{$num}}</td>
			<td>{{$ans->name}}</td>
			<td>{{$ans->score}}</td>
        </tr>
        @endforeach
	</tbody>
</table>
</body>

</html>