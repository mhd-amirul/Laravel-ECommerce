@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Daftar Product </h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Name</th>
                                <th>Gambar</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                            <tr>
                                <td class="serial">{{ $loop->iteration }}</td>
                                <td> <span class="name">{{ $gallery->barang->name }}</span> </td>
                                <td> <img src="{{ Storage::url($gallery->image) }}" class="figure-img img-fluid rounded"> </td>
                                <td>
                                    <a href="{{ route('gallery.edit',$gallery->id) }}" class="btn btn-info">edit</a>
                                    <form action="{{ route('gallery.destroy',$gallery->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center h3">DATA MASIH KOSONG</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
@endsection
