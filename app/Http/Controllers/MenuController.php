<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;
    //
    public function __construct(MenuRecursive $menuRecursive, Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }

    public function index(){
        $menus = $this->menu->paginate(3);
        return view('admin.menus.index',compact('menus'));
    }

    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);

        return redirect()->route('menus.index');
    }

    public function create(){
        $html = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menus.add',compact('html'));
    }

    public function edit($id){
        $menusIdForEdit = $this->menu->find($id);
        $htmlOption = $this->menuRecursive->menuRecursiveForEdit($menusIdForEdit->parent_id);
        return view('admin.menus.edit',compact('htmlOption','menusIdForEdit'));
    }

    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('admin.menus.index');
    }

    public function update($id,Request $request){
        $this->menu->find($id)->update([
            'name'=>$request->name,
            'parent_id' => $request -> parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('admin.menus.index');
    }

}
