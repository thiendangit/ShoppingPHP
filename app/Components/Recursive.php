<?php
namespace App\Components;

class Recursive {
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecursive($parentId ,$id = 0 , $text = ''){
        foreach ($this->data as $child) {
            if ($child['parent_id'] == $id) {
                if(!empty($parentId) && $parentId == $child['id']) {
                    $this->htmlSelect .= "<option selected value='" . $child['id'] . "'>" . $text . $child['name'] . "</option>";
                }else{
                    $this->htmlSelect .= "<option value='" . $child['id'] . "'>" . $text . $child['name'] . "</option>";
                }
                $this->categoryRecursive($parentId ,$child['id'],$text. '-');
            }
        }
        return $this->htmlSelect;
    }
}


