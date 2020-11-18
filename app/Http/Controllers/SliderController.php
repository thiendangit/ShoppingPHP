<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class SliderController extends Controller
{
    use StorageImageTrait;
    //
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataSliderCreate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataUploadImage = $this->storageTraitUpLoadImage($request, 'image_path', 'slider');
            if (!empty($dataUploadImage)) {
                $dataSliderCreate['image_name'] = $dataUploadImage['file_name'];
                $dataSliderCreate['image_path'] = $dataUploadImage['file_path'];
            }
            $this->slider->create($dataSliderCreate);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function edit($id){
        $sliderForEdit = $this->slider->find($id);
        return view('admin.slider.edit',compact('sliderForEdit'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataSliderUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataUploadImage = $this->storageTraitUpLoadImage($request, 'image_path', 'slider');
            if (!empty($dataUploadImage)) {
                $dataSliderUpdate['image_name'] = $dataUploadImage['file_name'];
                $dataSliderUpdate['image_path'] = $dataUploadImage['file_path'];
            }
            $this->slider->find($id)->update($dataSliderUpdate);
            DB::commit();
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }catch (\Exception $e){
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
            return response()->json([
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }


}
