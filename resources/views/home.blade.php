@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                    <table class="table table-striped">
                        <thead style="font-size:15px;">
                            <tr>
                                <th>Nama Website</th>
                                <th>Pemilik</th>
                                <th>Tanggal Selesai</th>
                                <th>Sisa Masa Aktif</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 14px;">
                            @foreach($webExpired as $key => $webExpired)
                            <tr>
                                {{-- <td>{{ $key+1 }}</td> --}}
                                <td> {{ $webExpired->url_website }} </td>
                                <td> {{ $webExpired->user->name }} </td>
                                <td> {{ date('d-m-Y', strtotime($webExpired->tgl_selesai)) }} </td>
                                {{-- <td> {{ date('d-m-Y', strtotime($webExpired->tgl_selesai)) }} </td> --}}
                                <td>
                                <script>
                CountDownTimer('{{$webExpired->tgl_aktif}}', 'countdown');
                function CountDownTimer(dt, id)
                {
                    var end = new Date('{{$webExpired->tgl_selesai}}');
                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour * 24;
                    var timer;
                    function showRemaining() {
                        var now = new Date( );
                        // alert(now);
                        var distance = end - now;
                        if (distance < 0) {

                            clearInterval(timer);
                            document.getElementById(id).innerHTML = '<b style="color:red">Expired</b> ';
                            return;
                        } else {
                            var days = Math.floor(distance / _day);
                        // var hours = Math.floor((distance % _day) / _hour);
                        // var minutes = Math.floor((distance % _hour) / _minute);
                        // var seconds = Math.floor((distance % _minute) / _second);

                        document.getElementById(id).innerHTML = days + ' Hari Lagi ';
                        }
                        
                    }
                    timer = setInterval(showRemaining, 1000);
                }
            </script>
            <div id="countdown"> 
</td>
<td>
    <form action=" {{ route('updateExpired', $webExpired->id) }} " method="post">
        @csrf
        @method('put')
        <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa fa-refresh"></i></button>
    </form>
</td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
