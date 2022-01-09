@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="container-fluid">
    <div class="card shadow" style="color: black">
        <div class="card-body">
            @if(Auth::user()->id == $post->user->id)
            <div class="row">
                <div class="col-0 mr-2 ml-3">
                    <form method="POST" action="/delete/blog/{{ $post->slug }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <div class="col-0">
                    <a href="/blog/{{$post->slug}}/edit" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                </div>
            </div>
            @endif
            <h5 class="card-title">{{ $post->title }}</h5>
            <div class="d-flex justify-content-between">
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->username }} |
                    <small>{{ $post->created_at }}</small></h6>
            </div>
            <hr>
            <img src="{{url('storage/blog/',$post->thumbnail)}}" width="100%" height="150px" alt="">
            <hr>
            <p class="card-text">{!! \Illuminate\Support\Str::markdown($post->content) !!}</p>
        </div>
    </div><br>


    <div>
        <form action="/detail/{{ $post->id }}/jawaban" method="POST">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="isi">Beri komentar disini</label>
                <textarea name="isi" id="isi"
                    class="form-control my-editor">{{-- {!! old('isi', $isi) !!} --}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Beri Komentar</button>
        </form>
    </div>
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
