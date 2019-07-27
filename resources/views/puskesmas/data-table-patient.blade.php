@extends('master.data-tables') @section('data-content')
<thead>
<tr>
    <th>NIK</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Umur</th>
    <th>Riwayat</th>
</tr>
</thead>
<tbody>
<tr>
    <td>3173879387</td>
    <td>BGSD</td>
    <td>JL jalan</td>
    <td>20</td>
    <td><a href="">Riwayat</a></td>
</tr>
<tr>
    <td>3173879387</td>
    <td>BGSD</td>
    <td>JL jalan</td>
    <td>20</td>
    <td><a href="">Riwayat</a></td>
</tr>
<tr>
    <td>3173879387</td>
    <td>BGSD</td>
    <td>JL jalan</td>
    <td>20</td>
    <td><a href="" class="btn-primary">Riwayat</a></td>
</tr>
<tr>
    <td>3173879387</td>
    <td>BGSD</td>
    <td>JL jalan</td>
    <td>20</td>
    <td><a href="">Riwayat</a></td>
</tr>
</tbody>
<tfoot>
<tr>
    <th>Name</th>
    <th>Position</th>
    <th>Office</th>
    <th>Age</th>
    <th>Start date</th>
</tr>
@if($patients != null && count($patients) > 0)
    @php
        dd($patients);
    @endphp
    @foreach($patients)
<tr>
    <th>{{ $patients['username'] }}</th>
    <th>{{ $patients['role'] }}</th>
    <th></th>
    <th></th>
    <th></th>
</tr>
    @endforeach
@endif
</tfoot>
@endsection