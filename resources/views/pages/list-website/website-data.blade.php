@extends('layouts._master')

@section('title', 'List Website')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>List Website</h1>
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
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Website</strong>
                    </div>  <!-- end .card-header -->

                    <div class="pull-right">
                        <a href=" {{ url('/list-website/create') }} " class="btn btn-secondary btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pemilik</th>
                                    <th>Url Website</th>
                                    <th>Tanggal Aktif</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Jenis Website</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listWebsite as $key => $listWebsite)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td> {{ $listWebsite->id_pelanggan  }} </td>
                                    <td> {{ $listWebsite->url_website }} </td>
                                    <td> {{ $listWebsite->tgl_aktif }} </td>
                                    <td> {{ $listWebsite->tgl_selesai }} </td>
                                    <td> {{ $listWebsite->periode }} </td>
                                    <td> {{ $listWebsite->status }} </td>
                                    <td> {{ $listWebsite->id_jenis_website }} </td>
                                    <td>
                                     <a href=" {{ url('list-website/edit', $listWebsite->id) }} " class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                                     <a href="#" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                                 </td>

                             </tr>
                             @endforeach

                         </tbody>
                     </table>
                 </div>

             </div> <!-- end .card -->
         </div> <!-- end .col-md-12 -->
     </div> <!-- end .row -->

 </div><!-- .animated -->
</div><!-- .content -->
@endsection
