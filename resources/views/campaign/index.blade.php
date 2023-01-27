@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active">Projek</li>
@endsection

@section('title', 'Projek')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <x-card>
            <x-slot name="header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-form"><i class="fas fa-plus-circle"></i> Tambah</button>
            </x-slot>
            <form action="" class="d-flex justify-content-between">
                <x-dropdown-table />
                <x-filter-table />
            </form>
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th widht="5%">No</th>
                        <th></th>
                        <th width="50%">Deskripsi</th>
                        <th>Tgl Publish</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </x-slot>
                <tr>
                    <td></td>
                </tr>
            </x-table>
        </x-card>
    </div>
</div>

<x-modal size="modal-xl">
    <x-slot name="title">
        Tambah Projek
    </x-slot>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="" id="" placeholder="Masukan Judul" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="categories">Kategori</label>
                <select name="" id="" class="form-control">
                    <option value="">Pilih Kategori</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Deskripsi Singkat</label>
        <textarea name="" id="" rows="5" placeholder="Masukan Deskripsi" class="form-control">

                    </textarea>
    </div>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </x-slot>
</x-modal>
@endsection

@include('include.datatable')
