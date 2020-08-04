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
                    

                    <div class="pull-right">
                        <a href=" {{ url('/list-website/create') }} " class="btn btn-secondary btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                    </div>  <!-- end .card-header -->
                    <div class="card-body">
                        <table id="bootstrap-data-table"  class="table table-striped table-data">
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
                                    <td> {{ (int) $key+1 }} </td>
                                    <td> {{ $listWebsite->user->name }} </td>
                                    <td> <a href=" {{ route('list-website.detail', $listWebsite->id) }} " style="color: #429dff;">{{ $listWebsite->url_website }} </a></td>
                                    <td> {{ date('d-m-Y', strtotime($listWebsite->tgl_aktif)) }} </td>
                                    <td> {{ date('d-m-Y', strtotime($listWebsite->tgl_selesai)) }} </td>
                                    <td> {{ $listWebsite->periode }} </td>
                                    <td> {{ $listWebsite->status }} </td>
                                    <td> {{ $listWebsite->jenisWebsite->jenis_website }} </td>
                                    <td>
                                        <a href=" {{ url('/list-website/update', $listWebsite->id) }} " class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        
                                   
                                       <form action=" {{ route('list-website.delete', $listWebsite->id) }} " method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" onclick="return confirm('Yakin Hapus Data Ini ?')"></i></button>
                                        </form>
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
