@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>DASHBOARD</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                </ol>
            </div>
        </div>

    </div>
</div>

@endsection


@section('content')
<div class="content mt-3">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
         <a href="{{ route('list-website.data') }} ">
            <div class="card-body pb-0">
                <div class="stat-icon dib pull-right">
                    <i class="fa fa-globe" style="font-size: 500%; color:#00000026 "></i>
                </div>
                <h3 class="mb-0">
                    <span class="count" style="color:#fff;">  {{ $listWebsite }} </span>
                </h3>
                <p class="text-light">Total Website</p>
            </div>
        </a>

    </div>
</div>
<!--/.col total website-->

<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-1">
        <div class="card-body pb-0">
            <div class="stat-icon dib pull-right">
                <i class="fa fa-globe" style="font-size: 500%; color:#00000026 "></i>
            </div>
            <h3 class="mb-0">
                <span class="count">{{ $listWebsiteSewa }}</span>
            </h3>
            <p class="text-light">Total Website Sewa</p>
        </div>

    </div>
</div>
<!--/.col total website sewa-->


<div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-1">
        <a href="#web-expired" style="color: #fff;"> 

            <div class="card-body pb-0">
                <div class="stat-icon dib pull-right">
                    <i class="fa fa-globe" style="font-size: 300%; color:#00000026; padding-bottom: 32px; "></i>
                </div>
                <h3 class="mb-0">
                    <span class="count">{{ $jumlahWebExpiredBulanIni }}</span>
                </h3>
                <p class="text-light">Website Expired Bulan Ini</p>

            </div>
        </a>
    </div>
</div>
<!--/.col total website yang akan expired-->

</div>

<!-- list website yang akan expired -->


<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h2 id="web-expired" class="card-title">List Web Yang Akan Expired</h2>   
        
                    <table class="table table-striped table-data">
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
                            @foreach ($webYangAkanExpired as $webDueDate)
                            <tr>
                                <td>
                                    <a href="{{ route('list-website.detail', $webDueDate->id) }}" style="color: #429dff; font-weight: bold;">{{ $webDueDate->url_website }}</a>
                                </td>
                                <td>{{ $webDueDate->user->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($webDueDate->tgl_selesai)) }}</td>
                                <td>
                                    @if ($webDueDate->expired_at <= 20)
                                    <p style="color: red; font-weight: bold;">{{ substr($webDueDate->expired_at, 0, 2) }} Hari Lagi</p>
                                    
                                    @else
                                    {{ substr($webDueDate->expired_at, 0, 2) }} Hari Lagi
                                    @endif
                                </td>
                                <td>
                                    <form action=" {{ route('updateExpired', $webDueDate->id) }} " method="post" >
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
                <!--/.col-->


            </div>
        </div>
    </div>
</div> <!-- /web-expires -->

<!-- list website yang sudah expired -->

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="card-title">List Web Yang Sudah Expired</h2>
                    
                    <p class="pull-right"> 

                    </p>
                    
                    <table class="table table-striped table-data">
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
                                <td>
                                    <a href="{{ route('list-website.detail', $webExpired->id) }}" style="color: #429dff; font-weight: bold;">{{ $webExpired->url_website }}</a>
                                </td>
                                <td> {{ $webExpired->user->name }} </td>
                                <td> {{ date('d-m-Y', strtotime($webExpired->tgl_selesai)) }} </td>
                                <td>
                                    @if($webExpired->tgl_selesai < $tglSekarang)
                                    Expired

                                    @else
                                    {{-- {{ ($webExpired->tgl_selesai) - ($tglSekarang)  }} --}} Hari Lagi 
                                    @endif
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
                <!--/.col-->


            </div>
        </div>
    </div>
</div> <!-- end col-md-12 -->




</div><!-- .content -->
@endsection
