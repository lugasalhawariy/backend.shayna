@extends('layouts.default')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <strong>Ubah Data Transaksi</strong>
                <small>{{ $item->name }}</small>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    {{-- name --}}
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama Pemesan</label>
                        <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" class="form-control 
                            @error('name')
                                is-invalid
                            @enderror"
                        />
                        @error('name')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- email --}}
                    <div class="form-group">
                        <label for="email" class="form-control-label">Tipe Barang</label>
                        <input type="email" name="email" value="{{ old('email') ? old('email') : $item->email }}" class="form-control 
                            @error('email')
                                is-invalid
                            @enderror"
                        />
                        @error('address')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Number --}}
                    <div class="form-group">
                        <label for="number" class="form-control-label">Nomor HP</label>
                        <input type="number" name="number" value="{{ old('number') ? old('number') : $item->number }}" class="form-control 
                            @error('number')
                                is-invalid
                            @enderror"
                        />
                        @error('number')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Address --}}
                    <div class="form-group">
                        <label for="address" class="form-control-label">Alamat Pemesan</label>
                        <textarea name="address" class="ckeditor form-control 
                            @error('address')
                                is-invalid
                            @enderror">
                            {{ old('address') ? old('address') : $item->address }}
                        </textarea>
                        @error('address')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- TOMBOL SUBMIT --}}
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">
                            Ubah Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection