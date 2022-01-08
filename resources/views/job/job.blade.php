@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Lowongan Kerja</h1>
    </div>

    @foreach($jobs as $job)
        <div class="card">
            <a href="/company/job/{{ $job->slug }}" style="color: black; text-decoration: none">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="{{ url('storage/blog/',$job->thumbnail) }}" class="card-img-top" width="100px" height="100px" alt="">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $job->user->username }} |
                            <small>{{ $job->created_at }}</small></h6>
                        <hr>
                        @php
                            $content = \Illuminate\Support\Str::markdown($job->content);
                        @endphp
                        <p class="card-text">
                            {!! \Illuminate\Support\Str::limit($content, 50) !!}
                            @if (strlen(strip_tags($content)) > 50)
                            ... <a href="{{ route('blog.detail') }}" class="btn btn-info btn-sm">Read More</a>
                            @endif
                        </p>
                    </div>
                </div>
            </a>
        </div><br>
    @endforeach

    @if($jobs->get(0)==null)
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">
                    Belum ada lowongan kerja ditawarkan.
                </p>
            </div>
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

