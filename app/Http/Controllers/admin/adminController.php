<?php

namespace App\Http\Controllers\admin;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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
    public function login()
    {
        return view('admin.login');
    }
}
