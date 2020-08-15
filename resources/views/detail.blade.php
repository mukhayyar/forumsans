@extends('layouts.master')

@push('style')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="card shadow" style="color: black">
        <div class="card-body">
            <h5 class="card-title">{{ $pertanyaan->judul }}</h5>
            <div class="d-flex justify-content-between">
                <h6 class="card-subtitle mb-2 text-muted">{{ $pertanyaan->user->name }} |
                    <small>{{ $pertanyaan->created_at }}</small></h6>
                <div class="d-flex justify-content-end">
                    <form action="/upvote_pertanyaan/{{ $pertanyaan->id }}" method="POST" class="form-inline">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-thumbs-up"></i>
                            ({{ $pertanyaan->up }})</button>
                    </form>
                    <form action="/downvote_pertanyaan" method="POST" class="form-inline">
                        @csrf
                        @method('put')
                        <button style="margin-left: 1em" type="submit" class="btn btn-primary btn-sm"><i
                                class="fas fa-thumbs-down"></i>
                            ({{ $pertanyaan->down }})</button>
                    </form>
                </div>
            </div>
            <hr>
            <p class="card-text">{!!$pertanyaan->isi!!}</p>
            @foreach($pertanyaan->tags as $tag)
                <span class="badge badge-pill badge-primary">{{ $tag->title }}</span>
            @endforeach
            <hr>
            @foreach($pertanyaan->komentar as $komentar)
                <p class="card-text">{!!$komentar->isi!!} <small>{{ $komentar->user->name }} |
                        {{ $komentar->created_at }}</small></p>
            @endforeach
            <a style="color: gray" href="#">Tambah Komentar</a>
        </div>
    </div><br>

    <h5 style="color: black"> {{ $pertanyaan->jumlahJawaban() }} Jawaban</h5>
    @foreach($pertanyaan->jawaban as $jawaban)
        <div class="card" style="color: black">
            <div class="card shadow" style="color: black">
                <div class="card-body">
                    @if($pertanyaan->user_id === Auth::user()->id)
                        <p>Jawaban Tepat // checked</p>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h6 class="card-subtitle mb-2 text-muted">{{ $jawaban->user->name }} |
                            <small>{{ $jawaban->created_at }}</small></h6>
                        <div class="d-flex justify-content-end">
                            <form action="/upvote_jawaban" method="POST" class="form-inline">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-thumbs-up"></i>
                                    ({{ $jawaban->up }})</button>
                            </form>
                            <form action="/downvote_jawaban" method="POST" class="form-inline">
                                @csrf
                                @method('put')
                                <button style="margin-left: 1em" type="submit" class="btn btn-primary btn-sm"><i
                                        class="fas fa-thumbs-down"></i>
                                    ({{ $jawaban->down }})</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">{!!$jawaban->isi!!}</p>
                    <hr>
                    @foreach($pertanyaan->jawaban->get(0)->komentar as $komentar_jawaban)
                        <p class="card-text">{!!$komentar_jawaban->isi!!} <small>{{ $komentar_jawaban->user->name }}
                                | {{ $komentar_jawaban->created_at }}</small></p>
                    @endforeach
                    <a style="color: gray" href="#">Tambah Komentar</a>
                </div>
            </div>
        </div><br>
    @endforeach

    <div>
        <form action="/detail/{{ $pertanyaan->id }}/jawaban" method="POST">
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
