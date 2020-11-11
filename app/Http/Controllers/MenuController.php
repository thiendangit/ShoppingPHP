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
        return view('menus.index');
    }

    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('menus.index');
    }

    public function create(){
        $html = $this->menuRecursive->menuRecursiveAdd();
        return view('menus.add',compact('html'));
    }
}
