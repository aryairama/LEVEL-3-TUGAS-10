@extends('layout.layout')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('js')
<script src="{{ asset('js/produk.js') }}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow bg-white">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 ">
                        <button class="btn btn-primary mt-2" type="button" onclick="add()">Tambah data</button>
                    </div>
                </div>
                <div class="table-responsive-md mt-3">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $produk)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->harga }}</td>
                                <td>{{ $produk->keterangan}}</td>
                                <td>{{ $produk->jumlah }}</td>
                                <td><button class="btn btn-danger"
                                        onclick="deleteForm({{ $produk->id_produk }})">Hapus</button>
                                    <button class="btn-warning btn"
                                        onclick="editForm({{ $produk->id_produk }})">Edit</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan=10>
                                    {{$produks->appends(Request::all())->links()}}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('produk.modal')
@endsection
