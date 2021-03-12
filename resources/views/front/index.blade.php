<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Bir Gezginin Anıları</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Ek tasarım kodları  -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>
<body>
<!-- Navbar  -->
<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
                     viewBox="0 0 24 24">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                    <circle cx="12" cy="13" r="4"/>
                </svg>
                <strong>Gezgin</strong>
            </a>

            <div class="form-inline my-2 my-lg-0">
                <a class="btn btn-outline-light" href="{{route('login')}}">
                    Giriş Yap
                </a>
            </div>
        </div>
    </div>
</header>
<!-- Blog  -->
<main>
    <!-- Kategori  -->
    <section class="container">
        <br/>
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Hepsi
                </button>

                @foreach(\App\Models\category::all() as $chunk => $value)
                    <button class="nav-link" id="{{$value['selflink']}}-tab" data-bs-toggle="tab"
                            data-bs-target="#{{$value['selflink']}}"
                            type="button" role="tab" aria-controls="{{$value['selflink']}}"
                            aria-selected="false">{{$value['name']}}
                        {{$value['id']}}
                    </button>
                @endforeach
            </div>
        </nav>
    </section>
    <!-- İçerik  -->
    <div class="tab-content album py-5 bg-light" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach(\App\Models\blog::all() as $chunk => $value)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{asset($value['image'])}}" class="card-img-top" alt="...">
                                <div class="card-footer">
                                    <small class="text-muted">
                                        @foreach($category as $key => $vv)
                                            @if($vv['id'] == $value['categoryId']) {{$vv['name']}} @endif
                                        @endforeach
                                    </small>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$value['name']}}</h5>
                                    <p class="card-text">{{$value['content']}}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{$value['created_at']}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @foreach(\App\Models\category::all() as $chunk => $vas)
            <div class="tab-pane fade container" id="{{$vas['selflink']}}" role="tabpanel"
                 aria-labelledby="{{$vas['selflink']}}-tab">
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    @foreach(\App\Models\blog::all() as $chunk => $value)
                        @if($value['categoryId'] == $vas['id'])

                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{asset($value['image'])}}" class="card-img-top" alt="...">
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            @foreach($category as $key => $vv)
                                                @if($vv['id'] == $value['categoryId'])
                                                    {{$vv['name']}}
                                                @endif
                                            @endforeach
                                        </small>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$value['name']}}</h5>
                                        <p class="card-text">{{$value['content']}}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">{{$value['created_at']}}</small>
                                    </div>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</main>
<!-- Footer  -->
<footer class="text-muted py-5">
    <div class="container">

    </div>
</footer>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

</body>
</html>

