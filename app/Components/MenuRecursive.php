<?php
namespace App\Components;

use App\Models\Menu;

class MenuRecursive {
    private $htmlSelect = '';
    public function __construct()
    {
        $this->htmlSelect = '';
    }

    public function menuRecursiveAdd($parentId = 0, $text = ''){
        $data = Menu::where('parent_id', $parentId) -> get();
        foreach ($data as $dataItem){
            $this->htmlSelect .= "<option value='" . $dataItem['id'] . "'>" . $text . $dataItem['name'] . "</option>";
            $this->menuRecursiveAdd($dataItem->id, $text . '-');
        }
        return $this->htmlSelect;
    }
}


