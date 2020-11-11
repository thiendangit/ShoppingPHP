<?php
namespace App\Components;

class Recursive {
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecursive($id = 0 , $text = ''){
        foreach ($this->data as $child) {
            if ($child['parent_id'] == $id) {
                $this->htmlSelect .=  "<option value='".$child['id']."'>" .$text. $child['name']. "</option>";
                $this->categoryRecursive($child['id'],$text. '-');
            }
        }
        return $this->htmlSelect;
    }
}


