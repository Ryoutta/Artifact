<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArtRequest;
use App\Models\Art;
use App\Models\Category;

class ArtController extends Controller
{
    public function index(Art $art)
    {
        return view('arts.index')->with(['arts' => $art->getPaginateByLimit(3)]);
    }
    public function show(Art $art)
    {
        return view('arts.show')->with(['art' => $art]);
    }
    
    // public function create()
    // {
    //     return view('arts/create');
    // }
    
    public function store(ArtRequest $request, Art $art)
    {
        
        $input = $request['art'];
        $input += ['user_id' => $request->user()->id];
        $input += ['flame_id' => 1];//TODO　フレームを選べるようにする。
        $art->fill($input)->save();
        return redirect('/arts/'.$art->id);
    }
    
    public function create(Category $category)
    {
        return view('arts.create')->with(['categories' => $category->get()]);
    }
    
    // public function update(ArtRequest $request, Art $art)
    // {
    //     $input_art = $request['art'];
    //     $input_art += ['user_id' => $request->user()->id];    //この行を追加
    //     $art->fill($input_art)->save();
    //     return redirect('/arts/' . $art->id);
    // }
}
