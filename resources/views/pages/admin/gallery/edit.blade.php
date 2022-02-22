@extends('layouts.admin')

@section('content')
    <div class="content">

    <form action="{{ route('gallery.update',$gallery->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <img src="{{ Storage::url($gallery->image) }}" width="300px" alt="">
        </div>
        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <select name="barang_id" class="form-control">
                @foreach ($barang as $item)
                    <option value="{{ $item->id }}" {{ $gallery->barang_id === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" id="image" class="form-control-file" name="image" value="{{ old('image') }}">
        </div>

        <div class="mb-3">
            <button class="btn btn-info form-control">Edit</button>
        </div>
    </form>

    </div>
@endsection
