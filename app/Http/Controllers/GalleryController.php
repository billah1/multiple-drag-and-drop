<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function show()
    {
        return view('image');
    }

    public function upload(Request $request)
    {
        $image = $request->file('file');
        $name = $request->file('file')->getClientOriginalName();

        $image->move(public_path('galleries'),$name);

        $model = new Gallery();
        $model->image_name = $name;
        $model->save();

        return response()->json(['success'=>$name]);
    }
}
