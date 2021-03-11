<?php

namespace App\Http\Controllers\admin\blog;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index()
    {
        $data = blog::paginate(10);
        $category = category::all();
        return view('admin.blog.index',['data'=>$data, 'category'=>$category]);
    }

    public function create()
    {
        $category = category::all();
        return view('admin.blog.create', ['category'=>$category]);
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1,9000),"blog",$request->file('image'));

        $insert = blog::create($all);
        if($insert)
        {
            return redirect()->back()->with('status','Yazı Başarıyla Eklendi');
        }
        else
        {
            return  redirect()->back()->with('status','Yazı Eklenemedi');
        }
    }
    public function edit($id)
    {
        $c = blog::where('id','=',$id)->count();
        if($c!=0) {
            $data = blog::where('id', '=', $id)->get();
            $category = category::all();
            return view('admin.blog.edit', ['category'=>$category, 'data' => $data]);
        }
        else
        {
            return redirect('/');
        }
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = blog::where('id','=',$id)->count();
        if($c!=0)
        {
            $data = blog::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,900),"blog",$request->file('image'),$data,"image");
            $update = blog::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','Yazı Düzenlendi');
            }
            else
            {
                return redirect()->back()->with('status','Yazı Düzenlenemedi');
            }
        }
        else
        {
            return redirect('/');
        }
    }
    public function delete($id)
    {
        $c = blog::where('id','=',$id)->count();
        if($c!=0)
        {
            $delete = blog::where('id','=',$id)->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/');
        }
    }
}
