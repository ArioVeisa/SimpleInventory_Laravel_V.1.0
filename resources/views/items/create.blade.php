@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Item Inventaris</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Item</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kuantitas</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Item</button>
    </form>
</div>
@endsection