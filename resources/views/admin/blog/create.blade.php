@extends('admin')
@section('content')
    <main>
        <br/>

        <div class="row">
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h4 class="mb-3">Yeni Yazı Ekle</h4>

                @if(session("status"))
                    <div class="alert alert-primary" role="alert">
                        {{session("status")}}
                    </div>
                @endif

                <form enctype="multipart/form-data" class="needs-validation" action="{{route('admin.blog.create.post')}}" method="POST" novalidate>
                    {{csrf_field()}}
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="name" class="form-control" id="title" placeholder="Başlık" value=""
                                   required>
                            <div class="invalid-feedback">
                                Boş geçilemez!
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="category" class="form-label">Kategori</label>
                            <select name="categoryId" class="form-select" id="category" required>
                                <option value="">Seç...</option>
                                @foreach($category as $key => $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Boş geçilemez!
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="content" class="form-label">İçerik</label>
                            <div class="input-group has-validation">
                                <textarea type="text" name="content" class="form-control" id="content"
                                          placeholder="İçeriğini buraya yaz." required></textarea>
                                <div class="invalid-feedback">
                                    Boş geçilemez!
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Resim Yükle</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Hadi Yazını Yayınla!</button>
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/checkout/form-validation.js') }}"></script>
@endsection
