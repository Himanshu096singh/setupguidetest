<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\Setup;
use View;

class SetupController extends Controller
{
    public function __construct()
    { 
       $settings = Setting::first();
       View::share(compact('settings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setup = Setup::all();
        return view('back.setup.index',compact('setup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.setup.create');
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->slug);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required | unique:companies',
            'image' => 'required | mimes:jpeg,jpg,png,gif,webp|required|max:10000',
            'description' => 'required',
            'prerequisite' => 'required',
            'alt' => 'required',
            'metatitle' => 'required',
            'metakeywords' => 'required',
            'metadescription' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $imgName = $request->file('image')->getClientOriginalName();
        $file = pathinfo($imgName, PATHINFO_FILENAME);
        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
        $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
        $imgName = strtolower($slugimg . '.' . $ext);

        $imgUrl = "upload/setup/" . strtolower($imgName);
        $request->image->move(public_path('upload/setup'), $imgName);

        $setup = new Setup;
        $setup->title             = $request->title;
        $setup->slug              = $slug;
        $setup->image             = $imgUrl;
        $setup->alt               = $request->alt;
        $setup->status            = $request->status;
        $setup->description       = $request->description;
        $setup->prerequisite      = $request->prerequisite;
        $setup->window            = $request->windows;
        $setup->mac               = $request->mac;
        $setup->metatitle         = $request->metatitle;
        $setup->metakeywords      = $request->metakeywords;
        $setup->metadescription   = $request->metadescription;
        $setup = $setup->save();

        if($setup){
            return redirect()->route('admin.setup.index')->with('success','Successfullly Added');
        } else {
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
            $setup = Setup::find($id);
                return view('back.setup.edit',compact('setup'));
            } catch (DecryptException $e) {
               abort('404');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $slug = Str::slug($request->slug);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required | unique:companies',
            'description' => 'required',
            'prerequisite' => 'required',
            'alt' => 'required',
            'metatitle' => 'required',
            'metakeywords' => 'required',
            'metadescription' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->file('image') != null) {
            $imgName = $request->file('image')->getClientOriginalName();
            $file = pathinfo($imgName, PATHINFO_FILENAME);
            $ext = pathinfo($imgName, PATHINFO_EXTENSION);
            $slugimg = uniqid() . '_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));
            $imgName = strtolower($slugimg . '.' . $ext);

            $imgUrl = "upload/setup/" . strtolower($imgName);
            $request->image->move(public_path('upload/setup'), $imgName);
            
            if(File::exists(public_path($request->oldimage))) {
                unlink(public_path($request->oldimage));
            }
            
        } else {
            $imgUrl = $request->oldimage;
        }

        $setup = Setup::find($id);
        $setup->title             = $request->title;
        $setup->slug              = $slug;
        $setup->image             = $imgUrl;
        $setup->alt               = $request->alt;
        $setup->status            = $request->status;
        $setup->description       = $request->description;
        $setup->prerequisite      = $request->prerequisite;
        $setup->window            = $request->windows;
        $setup->mac               = $request->mac;
        $setup->metatitle         = $request->metatitle;
        $setup->metakeywords      = $request->metakeywords;
        $setup->metadescription   = $request->metadescription;
        $setup = $setup->save();

        if($setup){
            return redirect()->back()->with('success','Successfullly Updated');
        } else {
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decryptString($id);
        $setup = Setup::findorFail($id);
        if($setup->image){
           $image_path = public_path().'/'. $setup->image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        } 
        $setup->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }
}
