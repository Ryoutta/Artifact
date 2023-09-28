<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArtRequest;
use App\Models\Art;
use App\Models\Category;
use Cloudinary;

class ArtController extends Controller
{
    public function index(Art $art)
    {
        return view('arts.index')->with(['arts' => $art->getPaginateByLimit(8)]);
        
    }
    public function show(Art $art)
    {
        return view('/arts/show')->with(['art' => $art]);
    }
    
    public function store(ArtRequest $request, Art $art)
    {
        $input = $request['art'];
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        $input += ['user_id' => $request->user()->id];
        $input += ['flame_id' => 1];//TODO　フレームを選べるようにする。
        $art->fill($input)->save();
        return redirect('/arts/'.$art->id);
    }
    
    public function create(Category $category)
    {
        return view('arts.create')->with(['categories' => $category->get()]);
    }
    
    public function edit(Art $art)
    {
        return view('arts/edit')->with(['art' => $art]);
    }
    
    public function update(ArtRequest $request, Art $art)
    {
        $input_art = $request['art'];
        $art->fill($input_art)->save();
        return redirect('/arts/' .$art->id);
    }
    
    public function delete(Art $art)
    {
        $art->delete();
        return redirect('/');
    }
    
    
    
}
