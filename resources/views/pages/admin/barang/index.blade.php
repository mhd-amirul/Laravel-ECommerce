@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title">Pembelian Terbaru </h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $p)
                            <tr>
                                <td class="serial">{{ $loop->iteration }}</td>
                                <td><span class="name">{{ $p->name }}</span> </td>
                                <td> <span class="product">{{ $p->type }}</span> </td>
                                <td><span class="count">{{ $p->quantity }}</span></td>
                                <td><span class="count">{{ $p->price }}</span></td>
                                <td>
                                    <a href="{{ route('barang.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('barang.destroy', $p->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-auto">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center h3">DATA KOSONG</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>
@endsection