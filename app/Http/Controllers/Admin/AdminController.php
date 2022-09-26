<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Setting;
use App\Models\Code;
use View;

class AdminController extends Controller
{
    public function __construct()
    {
       $settings = Setting::first();
       View::share(compact('settings'));
    }


    public function index(){
        return view('back.home');
    }

    public function settings(){
        $settings = Setting::first();
       return view('back.page.settings',compact('settings'));
    }

    public function savesettings(Request $request)
    {
      
       
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:255',
            'url'      => 'required|url|max:255',
            'email'     => 'required|email',
            'contact'   => 'required',
            'logo'      => 'mimes:jpeg,jpg,png,gif,webp|max:10000',
            'whitelogo'  => 'mimes:jpeg,jpg,png,gif,webp|max:10000',
            'fevicon'   => 'mimes:jpeg,jpg,png,gif,webp|max:10000',
            'index'      => 'required',
            'alt'        => 'required',
            'fcontent' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $setting = Setting::firstOrNew(['id' => 1]);

        if ($request->file('logo') != null) {
            $imgName = $request->file('logo')->getClientOriginalName();
            $file = pathinfo($imgName, PATHINFO_FILENAME);
            $ext = pathinfo($imgName, PATHINFO_EXTENSION);
            $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
            $imgName = strtolower($slugimg . '.' . $ext);

            if($setting->logo){
                $image_path = public_path().'/'. $setting->logo;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                } 

            $imglogo = "upload/settings/" . strtolower($imgName);
            $request->logo->move(public_path('upload/settings'), $imgName);
        } else {
            $imglogo = $request->oldlogo;
        }

        if ($request->file('whitelogo') != null) {
            $imgName = $request->file('whitelogo')->getClientOriginalName();
            $file = pathinfo($imgName, PATHINFO_FILENAME);
            $ext = pathinfo($imgName, PATHINFO_EXTENSION);
            $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
            $imgName = strtolower($slugimg . '.' . $ext);

            if($setting->whitelogo){
                $image_path = public_path().'/'. $setting->whitelogo;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                } 

            $imgwhitelogo = "upload/settings/" . strtolower($imgName);
            $request->whitelogo->move(public_path('upload/settings'), $imgName);
        } else {
            $imgwhitelogo = $request->oldwhitelogo;
        }

        if ($request->file('fevicon') != null) {
            $imgName = $request->file('fevicon')->getClientOriginalName();
            $file = pathinfo($imgName, PATHINFO_FILENAME);
            $ext = pathinfo($imgName, PATHINFO_EXTENSION);
            $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
            $imgName = strtolower($slugimg . '.' . $ext);

            if($setting->fevicon){
            $image_path = public_path().'/'. $setting->fevicon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            } 

            $imgfevicon = "upload/settings/" . strtolower($imgName);
            $request->fevicon->move(public_path('upload/settings'), $imgName);
        } else {
            $imgfevicon = $request->oldfevicon;
        }

        
       
        $setting->name       = $request->name;
        $setting->url       = $request->url;
        $setting->email       = $request->email;
        $setting->contact       = $request->contact;
        $setting->address       = $request->address;
        $setting->logo          = $imglogo;
        $setting->whitelogo     = $imgwhitelogo;
        $setting->fevicon       = $imgfevicon;
        $setting->alt           = $request->alt;
        $setting->index         = $request->index;
        $setting->fcontent      = $request->fcontent;

        $setting= $setting->save();

        if($setting){
            return redirect()->back()->with('success','Successfullly Added');
        } else {
            return redirect()->back()->with('error','Something Went Wrong');
        }
      
    }    

    public function code(){
        $code = Code::first();
        return view('back.page.code',compact('code'));
    }

    public function savecode(Request $request){
        $code = Code::firstOrNew(['id' => 1]);
        $code->header = $request->header;
        $code->footer = $request->footer;
        $code = $code->save();
    
        if($code){
            return redirect()->back()->with('success','Successfullly Added');
        } else {
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }
}
