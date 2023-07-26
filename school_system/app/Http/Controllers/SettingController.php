<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Storage;

class SettingController extends Controller
{
    public function index()
    {
        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });

        return view('pages.setting.index', $setting);
    }

    public function update(Request $request)
    {

        try {
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }

            if ($request->hasFile('logo')) {
                $logo_name = $request->file('logo')->getClientOriginalName();
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
                Storage::disk('upload_attachments')->delete('attachments/logo/'.$request->old_logo);
                $request->file('logo')->storeAs('attachments/logo/', $request->file('logo')->getClientOriginalName(), 'upload_attachments');

            }

            return back();
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}