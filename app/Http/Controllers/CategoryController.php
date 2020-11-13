<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Models\Caterory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;


    public function __construct(Caterory $category)
    {
        $this->category = $category;
    }

    public function create(){
        $htmlOption = $this->getCategory('');
        return view('admin.category.add',compact('htmlOption'));
    }

    public function getCategory($parent_id){
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }

    public function index(){
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id){
        $categories = $this->category->find($id);
        $htmlOption  = $this->getCategory($categories->parent_id);

        return view('admin.category.edit',compact('categories','htmlOption'));
    }


    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

    public function update($id,Request $request){
        $this->category->find($id)->update([
            'name'=>$request->name,
            'parent_id' => $request -> parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

}
