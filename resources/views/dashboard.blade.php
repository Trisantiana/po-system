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
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">  {{ $listWebsite }} </span>
                </h4>
                <p class="text-light">Total Website</p>
                <i class="fa fa-globe-asia"></i>
            </div>

        </div>
    </div>
    <!--/.col total website-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">{{ $listWebsiteSewa }}</span>
                </h4>
                <p class="text-light">Total Website Sewa</p>
                <i class="fa fa-globe-asia"></i>
            </div>

        </div>
    </div>
    <!--/.col total website sewa-->
</div>

<!-- list website yang akan expired -->


<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="card-title">List Web Expired</h4>            
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
                            @foreach ($webYangAkanExpired as $webDueDate)
                                <tr>
                                    <td>{{ $webDueDate->url_website }}</td>
                                    <td>{{ $webDueDate->user->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($webDueDate->tgl_selesai)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($webDueDate->expired_at)) }}</td>
                                    <td>
                                        @if ($webDueDate->tgl_selesai === $webDueDate->expired_at && $webDueDate->tgl_selesai === $tglSekarang)
                                            webExpired
                                        @else
                                        @endif
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
                    <h4 class="card-title">List Web Yang Sudah Expired</h4>
                    
                    {{-- <p class="pull-right"> {{ $tglSekarang }} </p> --}}
                    
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
