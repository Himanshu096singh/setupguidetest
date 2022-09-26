<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Sociallink;
use Illuminate\Support\Facades\Crypt;
use App\Models\Setting;
use View;

class SociallinkController extends Controller
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
        $link = Sociallink::get();
        return view('back.social.index',compact('link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('back.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type'     => 'required|unique:sociallinks,name',
            'url'      => 'required|url|max:255',
       ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $sociallink = new Sociallink;
        $sociallink->name = $request->type;
        $sociallink->url = $request->url;
        $sociallink = $sociallink->save();
        
        if($sociallink){
            return redirect()->back()->with('success','Successfullly Added');
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
        $id = Crypt::decryptString($id);
        $link = Sociallink::where('id',$id)->first();
        return view('back.social.edit',compact('link'));
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
        $validator = Validator::make($request->all(), [
            'url' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $social = Sociallink::find($id);
        $social->url = $request->url;
        $social = $social->save();
        if($social){
            return redirect()->route('admin.sociallink.index')->with('success','Successfullly update');
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
        $social = Sociallink::findorFail($id);
        $social->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }
}
