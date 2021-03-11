@extends('admin')
@section('content')
    <main>
        <br/>

        <div class="row">
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h4 class="mb-3">Yazı Düzenle</h4>

                @if(session("status"))
                    <div class="alert alert-primary" role="alert">
                        {{session("status")}}
                    </div>
                @endif

                <form enctype="multipart/form-data" class="needs-validation" action="{{route('admin.blog.edit.post',['id'=>$data[0]['id']])}}"
                      method="POST" novalidate>
                    {{csrf_field()}}
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="name" class="form-control" id="title" placeholder="Başlık"
                                   value="{{$data[0]['name']}}" required>
                            <div class="invalid-feedback">
                                Boş geçilemez!
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="category" class="form-label">Kategori</label>
                            <select name="categoryId" class="form-select" id="category" required>
                                <option value="">Seç...</option>
                                @foreach($category as $key => $value)
                                    <option @if($value['id'] == $data[0]['categoryId']) selected
                                            @endif value="{{$value['id']}}">{{$value['name']}}</option>
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
                                          placeholder="İçeriğini buraya yaz."
                                          required>{{$data[0]['content']}}</textarea>
                                <div class="invalid-feedback">
                                    Boş geçilemez!
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                @if($data[0]['image']!="")
                                    <img src="{{asset($data[0]['image'])}}" style="width:120px;height:120px;" alt="">
                                @endif
                                <br/>
                                    <br/>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Yazını Güncelle!</button>
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/checkout/form-validation.js') }}"></script>
@endsection
