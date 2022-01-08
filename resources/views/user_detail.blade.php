@extends('layouts.master')
@php
    use Illuminate\Support\Str;
@endphp
@push('style')
    <style>
        a {
            color: black;
        }

    </style>
@endpush

@section('content')
<div class="container-fluid">
    <h1>Profil</h1>

    <div class="row">
        <div class="col-sm-5">
            <div class="card shadow">
                <div class="card-body">
                    <h5>{{ $user->username }}</h5>
                    <p class="card-text">Reputasi: {{ $user->checkReputation() }}<br>Bergabung sejak
                        {{ date('d M Y', strtotime($user->created_at)) }}</p>
                </div>
            </div>
        </div>
    </div><br>

    <div class="card shadow">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardTag" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardTag">
            <h6 class="m-0 font-weight-bold text">Tag Favorit</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardTag">
            <div class="card-body">
                @if($user->pertanyaan->get(0))
                    @foreach($user->pertanyaan->get(0)->tags->take(9) as $tag)
                        <a href="#"><span class="badge badge-pill badge-primary">{{ $tag->title }}</span></a>
                    @endforeach
                @else
                    <p>Tidak ada data</p>
                @endif
            </div>
        </div>
    </div><br>

    <div class="card shadow">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardPertanyaan" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardPertanyaan">
            <h6 class="m-0 font-weight-bold text">Pertanyaan</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardPertanyaan">
            <div class="card-body">
                @if($user->pertanyaan->get(0))
                    @foreach($user->pertanyaan->take(5) as $pertanyaan)
                        <div class="d-flex justify-content-between">
                            <a href="/pertanyaan/{{ $pertanyaan->id }}">
                                <h6>{{ $pertanyaan->judul }}</h6>
                            </a>
                            <small>{{ date('d M Y', strtotime($pertanyaan->created_at)) }}</small>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p>Tidak ada data</p>
                    @if(Auth::check())
                        @if(Auth::user()->id == $user->id)
                        <strong> Buat pertanyaan pertamamu <a href="{{ route('create.pertanyaan') }}">disini!</a></strong>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div><br>

    <div class="card shadow">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardJawaban" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardJawaban">
            <h6 class="m-0 font-weight-bold text">Jawaban</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardJawaban">
            <div class="card-body">
                @if($user->jawaban->get(0))
                    @foreach($user->jawaban->take(5) as $jawaban)
                        <div class="d-flex justify-content-between">
                            <a href="/pertanyaan/{{ $jawaban->pertanyaan_id }}">
                                <h6>{!!Str::limit($jawaban->isi, 50, ' (...)')!!}</h6>
                            </a>
                            <small>{{ date('d M Y', strtotime($jawaban->created_at)) }}</small>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p>Tidak ada data</p>
                    @if(Auth::check())
                        @if(Auth::user()->id == $user->id)
                        <strong> Buat artikel pertamamu <a href="{{ route('blog.create') }}">disini!</a></strong>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
