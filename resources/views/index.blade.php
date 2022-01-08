@extends('layouts.bg')

@push('style')
    <style>
        h1 {
            margin-top: 200px;
            color: whitesmoke;
            font-family: Pacifico;
            font-size: 48px;
            line-height: 84px;
        }

        li,
        a {
            color: whitesmoke;
        }

    </style>
@endpush

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="#!">ForumSans</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">p
                <li class="nav-item"><a class="nav-link" href="#">Fitur</a></li>
                <li class="nav-item mr-2"><a class="nav-link" href="#">Testimoni</a></li>
                @guest
                <li class="nav-item mr-2"><a class="nav-link" href="/login">Login</a></li>
                @if(Route::has('register'))
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Register</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/register?as=user">For Programmers</a></li>
                        <li><a class="dropdown-item" href="/register?as=business">For Business</a></li>
                    </ul>
                </div>
                @endif
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}"
                    method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder text-white mb-2">Programmer Assamble!</h1>
                    <p class="lead text-white-50 mb-4">Mempertemukan programmer dengan sesama programmer. Membantu bisnis menemukan talenta digital.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Daftar Sebagai Programmer</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#!">Daftar Sebagai Perusahaan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Features section-->
<section class="py-5 border-bottom" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                <h2 class="h4 fw-bolder">Programmer Berbagi</h2>
                <p>Kami menyediakan platform untuk programmer bercengkrama melalui tulisannya dan membantu programmer lain dalam memecahkan masalah mereka!</p>
                <a class="text-decoration-none" href="#!">
                    Call to action
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                <h2 class="h4 fw-bolder">Job Portal</h2>
                <p>Perusahaan anda bisa dengan mudah menemukan pengguna profesional di platform kami untuk menjadi talenta digital anda</p>
                <a class="text-decoration-none" href="#!">
                    Call to action
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-4">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                <h2 class="h4 fw-bolder">Leaderboard</h2>
                <p>Berkompetisi dengan programmer lain untuk mencapai tingkat tertinggi di platform kami dengan berbagi!</p>
                <a class="text-decoration-none" href="#!">
                    Call to action
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials section-->
<section class="py-5 border-bottom">
    <div class="container px-5 my-5 px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Customer testimonials</h2>
            <p class="lead mb-0">Our customers love working with us</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <!-- Testimonial 1-->
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                            <div class="ms-4">
                                <p class="mb-1">Thank you for putting together such a great product. We loved working with you and the whole team, and we will be recommending you to others!</p>
                                <div class="small text-muted">- Client Name, Location</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2-->
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                            <div class="ms-4">
                                <p class="mb-1">The whole team was a huge help with putting things together for our company and brand. We will be hiring them again in the near future for additional work!</p>
                                <div class="small text-muted">- Client Name, Location</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
