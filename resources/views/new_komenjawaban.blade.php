@extends('layouts.master')

@push('style')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<div class="container-fluid">
    <h1>Pertanyaan Baru</h1>
    <form method="POST" action="/detail/{{$pertanyaan->id}}/komentar/{{$jawaban->id}}">
        @csrf
        <div class="form-group">
            <label for="isi">Isi/deskripsi Pertanyaan</label>
            <textarea name="isi" id="isi"
                class="form-control my-editor">{{-- {!! old('isi', $isi) !!} --}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@push('script')
<script src="{{ asset('js/tinymce4.js') }}"></script>
@endpush
