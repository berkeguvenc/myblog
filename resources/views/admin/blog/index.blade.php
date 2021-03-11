@extends('admin')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <br/>
        <h2>Blog Yazılarım</h2>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Başlık</th>
                    <th>İçerik</th>
                    <th>Resim</th>
                    <th>Kategori</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{$value['id']}}</td>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['content']}}</td>
                        <td>{{$value['image']}}</td>
                        <td>
                            @foreach($category as $key => $vv)
                                @if($vv['id'] == $value['categoryId']) {{$vv['name']}} @endif
                            @endforeach
                        </td>
                        <td><a href="{{route('admin.blog.edit',['id'=>$value['id']])}}">Düzenle</a></td>
                        <td><a href="{{route('admin.blog.delete',['id'=>$value['id']])}}">Sil</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </main>
@endsection
