@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <h1>Seluruh Blog</h1>
        @if(Auth::check())
        <a style="color: gray" href="/create/blog">
            <i class="fas fa-plus"></i>
            Buat Blog
        </a>
        @endif
    </div>
    <form action="/blog" method="get">
        <div class="form-group">
            <input type="text" name="cari" class="form-control" id="pertanyaan" aria-describedby="emailHelp" placeholder="Cari artikel yang kamu cari...">
        </div>
    </form>
    @foreach($posts as $post)
        <div class="card">
            <a href="/blog/{{ $post->slug }}" style="color: black; text-decoration: none">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="{{ url('storage/blog/',$post->thumbnail) }}" class="card-img-top" width="100px" height="100px" alt="">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->username }} |
                            <small>{{ $post->created_at }}</small></h6>
                        <hr>
                        @php
                            $content = \Illuminate\Support\Str::markdown($post->content);
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

    @if($posts->get(0)==null)
        <div class="card shadow">
            <div class="card-body">
                <p class="card-text">
                    Belum ada artikel yang terpublikasi.
                    @if(Auth::check())
                        @if(!Auth::user()->post->first())
                        <strong> Buat artikel pertamamu <a href="{{ route('blog.create') }}">disini!</a></strong>
                        @else
                        <strong> Belum ada yang buat artikel itu. Buat artikelmu sendiri <a href="{{ route('blog.create') }}">disini!</a></strong>
                        @endif
                    @endif
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

