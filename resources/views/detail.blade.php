@extends('layouts.master')

@push('style')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="card" style="color: black">
        <div class="card-body">
            <h5 class="card-title">Judul 1</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                Author | Tanggal Pertanyaan
                | <a href="#"><i class="fas fa-thumbs-up"></i> (100)</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> (10)</a>
            </h6>
            <hr>
            <p class="card-text">Isi pertanyaan disini</p>
            <span class="badge badge-pill badge-primary">Tag 1</span>
            <span class="badge badge-pill badge-primary">Tag 2</span>
            <span class="badge badge-pill badge-primary">Tag 3</span>
            <hr>
            <p class="card-text">Isi komentar pertama <small>Author | Tanggal Komentar</small></p>
            <p class="card-text">Isi komentar kedua <small>Author | Tanggal Komentar</small></p>
            <a style="color: gray" href="#">Tambah Komentar</a>
        </div>
    </div><br>

    <h5 style="color: black"> 2 Jawaban</h5>
    <div class="card" style="color: black">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                Author | Tanggal Jawaban
                | <a href="#"><i class="fas fa-thumbs-up"></i> (100)</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> (10)</a>
            </h6>
            <hr>
            <p class="card-text">Isi jawaban disini</p>
            <hr>
            <p class="card-text">Isi komentar pertama <small>Author | Tanggal Komentar</small></p>
            <p class="card-text">Isi komentar kedua <small>Author | Tanggal Komentar</small></p>
            <a style="color: gray" href="#">Tambah Komentar</a>
        </div>
    </div><br>
    <div class="card" style="color: black">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">
                Author | Tanggal Jawaban
                | <a href="#"><i class="fas fa-thumbs-up"></i> (100)</a>
                <a href="#"><i class="fas fa-thumbs-down"></i> (10)</a>
            </h6>
            <hr>
            <p class="card-text">Isi jawaban disini</p>
            <hr>
            <a style="color: gray" href="#">Tambah Komentar</a>
        </div>
    </div><br>

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
