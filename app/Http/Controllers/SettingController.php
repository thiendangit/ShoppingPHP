<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    //
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(Settings $request)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataSettingCreate = [
                'config_key' => $request->config_key,
                'config_value' => $request->config_value
            ];
            $this->setting->create($dataSettingCreate);
            DB::commit();
            return redirect()->route('setting.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function edit($id){
        $settingForEdit = $this->setting->find($id);
        return view('admin.setting.edit',compact('settingForEdit'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            //Insert data to product table
            $dataSettingUpdate = [
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
            ];
            $this->setting->find($id)->update($dataSettingUpdate);
            DB::commit();
            return redirect()->route('setting.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("Message : " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->setting->find($id)->delete();
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
