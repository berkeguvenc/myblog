@extends('admin')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <br/>
        <h2>Kategorilerim</h2>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Kategoriy Adı</th>
                    <th>Üst Kategori</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{$value['id']}}</td>
                        <td>{{$value['name']}}</td>
                        <td>
                            @if($value['topCategory'] == 0) Yok @endif
                            @foreach($data as $key => $vv)
                                @if($vv['id'] == $value['topCategory']) {{$vv['name']}} @endif
                            @endforeach
                        </td>
                        <td><a href="{{route('admin.category.edit',['id'=>$value['id']])}}">Düzenle</a></td>
                        <td><a href="{{route('admin.category.delete',['id'=>$value['id']])}}">Sil</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </main>
@endsection
