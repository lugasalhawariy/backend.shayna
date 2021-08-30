@extends('layouts.default')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Foto Barang</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- name product --}}
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama F Barang</label>
                        <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Photo --}}
                    <div class="form-group">
                        <label for="photo" class="form-control-label">Foto Barang</label>
                        <input type="file" name="photo" required value="{{ old('photo') }}" accept="image/*" class="form-control
                            @error('foto')
                                is-invalid
                            @enderror"
                        />
                        @error('photo')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Is Default --}}
                    <div class="form-group">
                        <label for="is_default" class="form-control-label">Jadikan Photo Default</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_default" value="1" id="is_default-yes" checked>
                            <label class="form-check-label" for="is_default-yes">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_default" value="0" id="is_default-no">
                            <label class="form-check-label" for="is_default-no">
                                Tidak
                            </label>
                        </div>
                        @error('is_default')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- TOMBOL SUBMIT --}}
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">
                            Tambah Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection