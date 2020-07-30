@extends('layouts._master')

@section('tite', 'Pelanggan Website')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>List Pelanggan Website</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"><i class="fa fa-users"></i></a></li>
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
                        <strong class="card-title">Data Pelanggan</strong>
                    

                    <div class="pull-right">
                        <a href=" {{ url('/pelanggan/create') }} " class="btn btn-secondary btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                    </div>  <!-- end .card-header -->
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>User</th>
                                    <th>Tanggal Terdaftar</th>
                                    <th colspan="2">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggan as $key => $pelanggan)
                                <tr>
                                    <td> {{ (int) $key+1 }} </td>
                                    <td> {{ $pelanggan->name }} </td>
                                    <td> {{ $pelanggan->email }} </td>
                                    <td> {{ $pelanggan->level->nama_level }} </td>
                                    <td> {{ date('d-m-Y', strtotime($pelanggan->created_at)) }} </td>
                                    <td colspan="2">
                                        <a href=" {{ route('pelanggan.edit', $pelanggan->id) }} " class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        
                                   
                                       <form action=" {{ route('pelanggan.delete', $pelanggan->id) }} " method="post">
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