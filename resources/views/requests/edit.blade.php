@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1>Edit Permintaan Sparepart</h1>
        </div>
    </div>

    <form action="{{ route('requests.update', $request->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="sparepart_name" class="form-label">Nama Sparepart</label>
            <input type="text" class="form-control @error('sparepart_name') is-invalid @enderror" 
                id="sparepart_name" name="sparepart_name" value="{{ old('sparepart_name', $request->sparepart_name) }}" required>
            @error('sparepart_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                id="quantity" name="quantity" value="{{ old('quantity', $request->quantity) }}" required>
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control @error('satuan') is-invalid @enderror" 
                id="satuan" name="satuan" value="{{ old('satuan', $request->satuan) }}" required>
            @error('satuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kebutuhan_part" class="form-label">Kebutuhan Part</label>
            <input type="text" class="form-control @error('kebutuhan_part') is-invalid @enderror" 
                id="kebutuhan_part" name="kebutuhan_part" value="{{ old('kebutuhan_part', $request->kebutuhan_part) }}">
            @error('kebutuhan_part')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $request->keterangan) }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <a href="{{ route('requests.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection 