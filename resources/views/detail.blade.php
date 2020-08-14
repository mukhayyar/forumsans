@extends('layouts.master')

@push('style')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="card" style="color: black">
        <div class="card-body">
            <h5 class="card-title">{{$pertanyaan->judul}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
            {{$pertanyaan->user->name}} | {{$pertanyaan->created_at}}
                | <a href="#"><i class="fas fa-thumbs-up"></i> ({{$pertanyaan->up}})</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> ({{$pertanyaan->down}})</a>
            </h6>
            <hr>
            <p class="card-text">{{$pertanyaan->isi}}</p>
            <span class="badge badge-pill badge-primary">Tag 1</span>
            <span class="badge badge-pill badge-primary">Tag 2</span>
            <span class="badge badge-pill badge-primary">Tag 3</span>
            <hr>
            @foreach($pertanyaan->komentar as $komentar)
            <p class="card-text">{{$komentar->isi}} <small>{{$komentar->user->name}} | {{$komentar->created_at}}</small></p>
            @endforeach
            <a style="color: gray" href="#">Tambah Komentar</a>
        </div>
    </div><br>

    <h5 style="color: black"> 2 Jawaban</h5>
    @foreach($pertanyaan->jawaban as $jawaban)
    <div class="card" style="color: black">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                {{$jawaban->user->name}} | {{$jawaban->created_at}}
                | <a href="#"><i class="fas fa-thumbs-up"></i> ({{$jawaban->up}})</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> ({{$jawaban->down}})</a>
            </h6>
            <hr>
            <p class="card-text">{{$jawaban->isi}}</p>
            <hr>
            @foreach($pertanyaan->jawaban->get(0)->komentar as $komentar_jawaban)
            <p class="card-text">{{$komentar_jawaban->isi}} <small>{{$komentar_jawaban->user->name}} | {{$komentar_jawaban->created_at}}</small></p>
            @endforeach
            <a style="color: gray" href="#">Tambah Komentar</a>
        </div>
    </div><br>
    @endforeach
    <div>
        <form>
            @csrf
            <div class="form-group">
                <label for="isi">Isi/deskripsi Jawaban</label>
                <textarea name="isi" id="isi"
                    class="form-control my-editor">{{-- {!! old('isi', $isi) !!} --}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Jawaban</button>
        </form>
    </div><br>
</div>
@endsection

@push('script')
    <script src="{{ asset('js/tinymce4.js') }}"></script>
@endpush
