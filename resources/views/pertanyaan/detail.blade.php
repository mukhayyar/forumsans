@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="card shadow" style="color: black">
        <div class="card-body">
            @if(Auth::user()->id == $pertanyaan->user->id)
            <div class="row">
                <div class="col-0 mr-2 ml-3">
                    <form method="POST" action="/pertanyaan/{{ $pertanyaan->slug }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <div class="col-0">
                    <a href="/pertanyaan/{{ $pertanyaan->slug }}/edit" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                </div>
            </div>
            @endif
            <h5 class="card-title">{{ $pertanyaan->judul }}</h5>
            <div class="d-flex justify-content-between">
                <h6 class="card-subtitle mb-2 text-muted">{{ $pertanyaan->user->username }} |
                    <small>{{ $pertanyaan->created_at }}</small></h6>
                <div class="d-flex justify-content-end">

                    <form action="/upvote_pertanyaan/{{ $pertanyaan->id }}" method="POST" class="form-inline">
                        @csrf
                        @method('put')
                        @if(Auth::check())
                        @if(Auth::user()->id === $pertanyaan->user_id)
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Kamu tidak diperbolehkan like pertanyaan kamu">
                            <button disabled type="submit" class="btn btn-primary btn-sm"><i
                                class="fas fa-thumbs-up"></i>
                            (@isset($pertanyaan->vote->get(0)->up)
                            {{$pertanyaan->vote->where('pertanyaan_id', $pertanyaan->id)->sum('up')}}
                            @endisset
                            @empty($pertanyaan->vote->get(0)->up)
                            @endempty)</button>
                        </span>
                        @else
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-thumbs-up"></i>
                                (@isset($pertanyaan->vote->get(0)->up)
                                {{$pertanyaan->vote->where('pertanyaan_id', $pertanyaan->id)->sum('up')}}
                                @endisset
                                @empty($pertanyaan->vote->get(0)->up)
                                @endempty)</button>
                        @endif
                        @endif
                    </form>
                    <form action="/downvote_pertanyaan/{{ $pertanyaan->id }}" method="POST" class="form-inline">
                        @csrf
                        @method('put')
                        @if(Auth::check())
                        @if(Auth::user()->reputation < 15 || Auth::user()->id === $pertanyaan->user_id)

                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Reputasi kamu masih kurang atau ini adalah pertanyaan kamu">
                            <button disabled style="margin-left: 1em" type="submit" class="btn btn-primary btn-sm"><i
                                class="fas fa-thumbs-down"></i>
                            (@isset($pertanyaan->vote->get(0)->down)
                            {{$pertanyaan->vote->where('pertanyaan_id', $pertanyaan->id)->sum('down')}}
                            @endisset
                            @empty($pertanyaan->vote->get(0)->down)
                            @endempty)</button>
                        </span>
                        @else
                            <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                            <button style="margin-left: 1em" type="submit" class="btn btn-primary btn-sm"><i
                                    class="fas fa-thumbs-down"></i>
                                    (@isset($pertanyaan->vote->get(0)->down)
                                    {{$pertanyaan->vote->where('pertanyaan_id', $pertanyaan->id)->sum('down')}}
                                    @endisset
                                    @empty($pertanyaan->vote->get(0)->down)
                                    @endempty)</button>
                        @endif
                        @endif
                    </form>
                </div>
            </div>
            <hr>
            <p class="card-text">{!!\Illuminate\Support\Str::markdown($pertanyaan->isi)!!}</p>
            @foreach($pertanyaan->tags as $tag)
                <span class="badge badge-pill badge-primary">{{ $tag->title }}</span>
            @endforeach
            <hr>
            @foreach($pertanyaan->komentar->take(3) as $komentar)
                <p class="card-text">{!!$komentar->isi!!} <small>{{ $komentar->user->username }} |
                        {{ $komentar->created_at }}</small></p>
            @endforeach
            <a style="color: gray" href="/pertanyaan/{{ $pertanyaan->id }}/komentar">Tambah Komentar</a>
        </div>
    </div><br>

    <h5 style="color: black"> {{ $pertanyaan->jumlahJawaban() }} Jawaban</h5>
    @foreach($pertanyaan->jawaban as $jawaban)
        <div class="card" style="color: black">
            <div class="card shadow" style="color: black">
                <div class="card-body">
                    @if(Auth::check())
                    @if($pertanyaan->user_id === Auth::user()->id && $jawaban->user_id !== Auth::user()->id && $pertanyaan->jawaban_tepat_id === null)
                        <form action="/pertanyaan/{{ $pertanyaan->id }}/jawaban_benar" method="POST">
                            @csrf
                            <label for="">Tandai benar </label>
                            <input type="checkbox" name="jawaban_tepat" id="check" value="{{ $jawaban->id }}">
                            <input type="hidden" id="id" name="id" value="{{ $jawaban->user_id }}">
                            <input type="submit" value="Submit">
                        </form>
                    @endif
                    @endif
                    @if($jawaban->id === $pertanyaan->jawaban_tepat_id)
                        <p>Jawaban Terbaik <i class="fas fa-check" style="color: green"></i></p>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h6 class="card-subtitle mb-2 text-muted">{{ $jawaban->user->username }} |
                            <small>{{ $jawaban->created_at }}</small></h6>
                        <div class="d-flex justify-content-end">
                            <form action="/upvote_jawaban/{{ $jawaban->id }}" method="POST" class="form-inline">
                                @csrf
                                @method('put')
                                @if(Auth::check())
                                @if(Auth::user()->id === $jawaban->user_id)
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Kamu tidak diperbolehkan like jawaban kamu">
                                    <button disabled type="submit" class="btn btn-primary btn-sm"><i
                                        class="fas fa-thumbs-up"></i>
                                    (@isset($jawaban->vote->get(0)->up)
                                    {{$jawaban->vote->where('jawaban_id', $jawaban->id)->sum('up')}}
                                    @endisset
                                    @empty($jawaban->vote->get(0)->up)
                                    @endempty)</button>
                                </span>
                                {{-- @isset($jawaban->vote->get(0)->user_id)
                                @elseif(Auth::user()->id === $jawaban->vote->get(0)->user_id)
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Reputasi kamu masih kurang atau ini adalah jawaban kamu">
                                    <button disabled style="margin-left: 1em" type="submit" class="btn btn-primary btn-sm"><i
                                        class="fas fa-thumbs-up"></i>
                                    (@isset($jawaban->vote->get(0)->up){{$jawaban->vote->get(0)->up}}
                                    @endisset
                                    @empty($jawaban->vote->get(0)->up)

                                    @endempty)</button>
                                </span>
                                @endisset
                                @empty($jawaban->vote->get(0)->user_id)

                                @endempty --}}
                                @else
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="fas fa-thumbs-up"></i>
                                        (@isset($jawaban->vote->get(0)->up)
                                        {{$jawaban->vote->where('jawaban_id', $jawaban->id)->sum('up')}}
                                        @endisset
                                        @empty($jawaban->vote->get(0)->up)
                                        @endempty)</button>
                                @endif
                                @endif
                            </form>
                            <form action="/downvote_jawaban/{{ $jawaban->id }}" method="POST" class="form-inline">
                                @csrf
                                @method('put')
                                @if(Auth::check())
                                @if(Auth::user()->reputation < 15 || Auth::user()->id === $jawaban->user_id)
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Reputasi kamu masih kurang atau ini adalah jawaban kamu">
                                    <button disabled style="margin-left: 1em" type="submit"
                                    class="btn btn-primary btn-sm"><i class="fas fa-thumbs-down"></i>
                                    (@isset($jawaban->vote->get(0)->down)
                                    {{$jawaban->vote->where('jawaban_id', $jawaban->id)->sum('down')}}
                                    @endisset
                                    @empty($jawaban->vote->get(0)->down)
                                    @endempty)</button>
                                </span>
                                {{-- @isset($jawaban->vote->get(0)->user_id)
                                @elseif(Auth::user()->id === $jawaban->vote->get(0)->user_id)
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Reputasi kamu masih kurang atau ini adalah jawaban kamu">
                                    <button disabled style="margin-left: 1em" type="submit" class="btn btn-primary btn-sm"><i
                                        class="fas fa-thumbs-down"></i>
                                    (@isset($jawaban->vote->get(0)->down){{$jawaban->vote->get(0)->down}}
                                    @endisset
                                    @empty($jawaban->vote->get(0)->down)

                                    @endempty)</button>
                                </span>
                                @endisset
                                @empty($jawaban->vote->get(0)->user_id)

                                @endempty --}}
                                @else
                                    <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                                    <button style="margin-left: 1em" type="submit" class="btn btn-primary btn-sm"><i
                                            class="fas fa-thumbs-down"></i>
                                        (@isset($jawaban->vote->get(0)->down)
                                        {{$jawaban->vote->where('jawaban_id', $jawaban->id)->sum('down')}}
                                        @endisset
                                        @empty($jawaban->vote->get(0)->down)
                                        @endempty)</button>
                                @endif
                                @endif
                            </form>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">{!!$jawaban->isi!!}</p>
                    <hr>
                    @foreach($jawaban->komentar->take(3) as $komentar_jawaban)
                        <p class="card-text">{!!$komentar_jawaban->isi!!} <small>{{ $komentar_jawaban->user->username }}
                                | {{ $komentar_jawaban->created_at }}</small></p>
                    @endforeach
                    <a style="color: gray" href="/pertanyaan/{{ $pertanyaan->id }}/komentar/{{ $jawaban->id }}">Tambah
                        Komentar</a>
                </div>
            </div>
        </div><br>
    @endforeach
    @if(Auth::check());
    <div>
        <form action="/pertanyaan/{{ $pertanyaan->id }}/jawaban" id="createPostForm" method="POST">
            @csrf
            <div class="form-group">
                <label for="editor" class="text-gray-600 font-semibold">Isi/deskripsi Jawaban</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <input type="hidden" name="isi" id="isi">
            <div>
            <button class="btn btn-primary mt-2">Simpan Jawaban</button>
        </form>
    </div>
    @endif
</div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    @if(Session::has('sukses'))
    toastr.success('{{Session::get('sukses')}}', 'Sukses')
    @endif
    </script>
@endpush
