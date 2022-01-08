@extends('layouts.master')

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
    <form method="POST" id="createPostForm" action="/pertanyaan/create">
        @csrf
        <div class="form-group">
            <label for="judul">Judul Pertanyaan</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Tulis judul pertanyaan anda">
        </div>
        <div class="form-group">
            <label for="editor" class="text-gray-600 font-semibold">Isi/deskripsi Pertanyaan</label>
            <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <input type="hidden" name="isi" id="isi">
        <div>
        <div class="form-group">
            <label for="tag">Tag Pertanyaan</label>
            <input type="text" class="form-control" id="tag" name="tag"
                placeholder="Tulis tag dengan #nama_tag tanpa spasi. Contoh:#php#error#vscode">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
