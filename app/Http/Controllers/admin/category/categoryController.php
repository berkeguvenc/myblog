<?php

namespace App\Http\Controllers\admin\category;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        $data = category::paginate(10);

        return view('admin.category.index',['data'=>$data]);
    }

    public function create()
    {
        $data = category::all();
        return view('admin.category.create',['data'=>$data]);
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);

        $insert = category::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Kategori Başarıyla Eklendi');
        }
        else
        {
            return  redirect()->back()->with('status','Kategori Eklenemedi');
        }
    }
    public function edit($id)
    {
        $c = category::where('id','=',$id)->count();
        if($c!=0) {
            $data = category::where('id', '=', $id)->get();
            $category = category::all();
            return view('admin.category.edit', ['category'=>$category, 'data' => $data]);
        }
        else
        {
            return redirect('/');
        }
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = category::where('id','=',$id)->count();
        if($c!=0)
        {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = category::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','Kategori Düzenlendi');
            }
            else
            {
                return redirect()->back()->with('status','Kategori Düzenlenemedi');
            }
        }
        else
        {
            return redirect('/');
        }
    }
    public function delete($id)
    {
        $c = category::where('id','=',$id)->count();
        if($c!=0)
        {
            $delete = category::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    }
}
