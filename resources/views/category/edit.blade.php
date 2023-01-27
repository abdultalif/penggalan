@extends('layouts.app')

@section('title')
Edit Kategori
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('category.index') }}">Kategori</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12">
        <x-card>
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" value="{{ $category->name }}" class="form-control @error('kategori') is-invalid @enderror" name="kategori" placeholder="Masukan Kategori">
                    @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('category.index') }}" class="btn btn-danger">Batal</a>
                    <button class="btn btn-success">Edit</button>
                </div>
            </form>
        </x-card>
        <div class="card">

        </div>
    </div>
</div>
@endsection
