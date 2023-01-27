@extends('layouts.app')

@section('title')
Tambah Kategori
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></li>
<li class="breadcrumb-item active">Tambah</li>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <x-card>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" value="{{ old('kategori') }}" class="form-control @error('kategori') is-invalid @enderror" autocomplete="off" name="kategori" placeholder="Masukan Kategori">
                    @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <x-slot name="footer">
                    <div class="form-group">
                        <a href="{{ route('category.index') }}" class="btn btn-danger">Batal</a>
                        <button class="btn btn-success">Tambah</button>
                    </div>
                </x-slot>
            </x-card>
        </form>
    </div>
</div>
</div>
@endsection
