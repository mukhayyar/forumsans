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
    <h1>Buat Artikel Baru</h1>
    <form method="POST" id="editPostForm" action="/blog/{{$post->slug}}/edit" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul Blog</label>
            <input type="text" class="form-control" id="judul" name="title" placeholder="Tulis judul blog kamu" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="editor" class="text-gray-600 font-semibold">Konten</label>
            <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <input type="hidden" value="{{$post->content}}" id="oldContent">
            <input type="hidden" name="content" id="isi">
        <div>
        <div class="form-group ">
            <label for="editor" class="text-gray-600 font-semibold">Thumbnail</label>
            <input type="file" class="form-control-file" name="thumbnail" id="isi">
        <div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
