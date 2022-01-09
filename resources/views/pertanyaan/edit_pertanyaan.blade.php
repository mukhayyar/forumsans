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
    <form method="POST" id="editPostForm" action="/pertanyaan/{{$pertanyaan->slug}}/edit">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul Pertanyaan</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Tulis judul pertanyaan anda" value="{{$pertanyaan->judul}}">
        </div>
        <div class="form-group">
            <label for="editor" class="text-gray-600 font-semibold">Isi/deskripsi Pertanyaan</label>
            <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <input type="hidden" value="{{$pertanyaan->isi}}" id="oldContent">
            <input type="hidden" name="isi" id="isi">
        <div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
