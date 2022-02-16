@extends('layouts.admin')

@section('content')
    <div class="content">
        <form action="{{ route('barang.store') }}" method="post">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf    
                <div class="mb-3">
                    <label for="name" class="form-label" >Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label" >Type</label>
                    <input type="text" name="type" class="form-control" id="type" placeholder="Type" value="{{ old('type') }}">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label" >Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="quantity" value="{{ old('quantity') }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label" >Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="price" value="{{ old('price') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label" >Description</label>
                    <textarea name="description" name="description" id="description" cols="30" class="form-control" rows="10">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-info form-control">Tambah</button>
                </div>
        </form>
    </div>
@endsection