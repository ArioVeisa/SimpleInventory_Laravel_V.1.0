@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Inventaris</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Tambah Item</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->price, 2, ',', '.') }}</td> <!-- Format harga -->
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
