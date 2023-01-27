@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{ route('campaign.index') }}">Projek</a></li>
<li class="breadcrumb-item">Tambah</li>
@endsection

@section('title', 'Tambah Projek')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <x-card>
            <form action="">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" name="" id="" placeholder="Masukan Judul" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Kategori</label>
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
                    <a href="{{ route('campaign.index') }}" class="btn btn-danger">Kembali</a>
                    <button class="btn btn-primary">Simpan</button>
                </x-slot>
            </form>
        </x-card>
    </div>
</div>
@endsection