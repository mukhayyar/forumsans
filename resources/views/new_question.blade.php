@extends('layouts.master')

@push('style')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Pertanyaan Baru</h1>
    <form method="POST" action="/create">
        @csrf
        <div class="form-group">
            <label for="judul">Judul Pertanyaan</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Tulis judul pertanyaan anda">
        </div>
        <div class="form-group">
            <label for="isi">Isi/deskripsi Pertanyaan</label>
            <textarea name="isi" id="isi"
                class="form-control my-editor">{{-- {!! old('isi', $isi) !!} --}}</textarea>
        </div>
        <div class="form-group">
            <label for="tag">Tag Pertanyaan</label>
            <input type="text" class="form-control" id="tag" name="tag"
                placeholder="Tulis tag dengan #nama_tag tanpa spasi. Contoh:#php#error#vscode">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@push('script')
<script src="{{ asset('js/tinymce4.js') }}"></script>
@endpush
