@extends('layouts.master')

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
                    <h5>Beta Tester</h5>
                    <p class="card-text">Reputasi: 99<br>Bergabung sejak 1 Agustus 1900</p>
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
                @for($i = 1; $i <= 3; $i++)
                    <a href="/home"><span class="badge badge-pill badge-primary">Tag 1</span></a>
                @endfor
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
                @for($i = 1; $i <= 2; $i++)
                    <div class="d-flex justify-content-between">
                        <a href="/detail">
                            <h6>Pertanyaan 1</h6>
                        </a>
                        <small>1 Jan 1990</small>
                    </div>
                    <hr>
                @endfor
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
                @for($i = 1; $i <= 2; $i++)
                    <div class="d-flex justify-content-between">
                        <a href="/detail">
                            <h6>Pertanyaan 1</h6>
                        </a>
                        <small>1 Jan 1990</small>
                    </div>
                    <hr>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
