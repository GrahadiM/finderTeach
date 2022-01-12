<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $setting = Website::get()->first();
        return view('admin.setting-website.update', compact('setting'));
    }

    public function update(Request $request, Website $setting)
    {
        $this->validate($request, [
            'title_web' => 'required|string|max:100',
            'name_web' => 'nullable|string|max:100',
            'footer_web' => 'required|string|max:150',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'favicon' => 'nullable|mimes:jpg,png,jpeg,ico|max:1000',            
        ]);

        $data = $request->only(['title_web', 'name_web', 'footer_web']);

        if($request->hasFile('logo')){
            // $logo = $request->logo->store('logo');
            $logo = $this->uploadGambar($request->logo);

            if($setting->logo !== "logo_default.jpg"){
                File::delete('images/setting'.$setting->logo);
            }

            $data['logo'] = $logo;
        }

        if($request->hasFile('favicon')){
            $favicon = $this->uploadGambar($request->favicon);

            if($setting->favicon !== "favicon_default.ico"){
                File::delete('images/setting'.$setting->favicon);
            }

            $data['favicon'] = $favicon;
        }
        
        // dd($data);
        $setting = Website::get()->first();
        $setting->update($data);

        session()->flash('success', "Data has been updated!!");

        //redirect user
        return redirect()->back();
    }

    public function uploadGambar($gambar)
    {

        $gambar->move(public_path('images/setting'), $gambar->getClientOriginalName());

        return $gambar->getClientOriginalName();
    }
}
