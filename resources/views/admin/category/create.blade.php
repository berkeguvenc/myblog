@extends('admin')
@section('content')
    <main>
        <br/>

        <div class="row">
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h4 class="mb-3">Yeni Kategori Ekle</h4>

                @if(session("status"))
                    <div class="alert alert-primary" role="alert">
                        {{session("status")}}
                    </div>
                @endif

                <form class="needs-validation" action="{{route('admin.category.create.post')}}" method="POST" novalidate>
                    {{csrf_field()}}
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="title" class="form-label">Kategori Adı</label>
                            <input type="text" name="name" class="form-control" id="title" placeholder="Başlık" value=""
                                   required>
                            <div class="invalid-feedback">
                                Boş geçilemez!
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="category" class="form-label">Üst Kategori (İsteğe bağlı)</label>
                            <select name="topCategory" class="form-select" id="category" required>
                                <option value="0">Seç...</option>
                                @foreach($data as $key => $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Boş geçilemez!
                            </div>
                        </div>


                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Kategoriyi Ekle!</button>
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/checkout/form-validation.js') }}"></script>
@endsection
