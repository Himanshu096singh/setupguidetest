<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use App\Traits\ImageTrait;

use Exception;
use View;

class CategoryController extends Controller
{
    use ImageTrait;
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
       $category = Category::with('companies')->paginate(10); 
       return view('back.category.index',compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'slug' => 'required | unique:categories',
                'image' => 'required | mimes:jpeg,jpg,png,gif,webp|required|max:10000',
                'icon' => 'required | mimes:jpeg,jpg,png,gif,webp|required|max:10000',
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
    
            $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/category');
            $imgUrl2 = $this->verifyAndUpload($request, 'icon', 'upload/category');
            
            // return $imgurl .'-'. $imgUrl2
            $category = new Category;
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->image = $imgUrl;
            $category->icon = $imgUrl2;
            $category->status = $request->status;
            $category->alt = $request->alt;
            $category->metatitle = $request->metatitle;
            $category->metakeywords = $request->metakeywords;
            $category->metadescription = $request->metadescription;
            $category = $category->save();
    
            if($category){
                return redirect()->route('admin.category.index')->with('success','Successfullly Added');
            } else {
                return redirect()->back()->with('error','Something Went Wrong');
            }
        } catch (Exception $e){
            $message = $e->getMessage();
            var_dump('Exception Message: '. $message);
  
            $code = $e->getCode();       
            var_dump('Exception Code: '. $code);
  
            // $string = $e->__toString();       
            // var_dump('Exception String: '. $string);
  
            exit;
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
       return $id;
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
        
         $category = Category::with('companies')->where('id',$id)->first();
        return view('back.category.edit',compact('category'));

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,webp|max:10000',
            'icon' => 'mimes:jpeg,jpg,png,gif,webp|max:10000',
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
            $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/category');
            if(File::exists(public_path($request->oldimage))) {
                unlink(public_path($request->oldimage));
            }
        } else {
            $imgUrl = $request->oldimage;
        }


        if ($request->file('icon') != null) {
            $imgUrl2 = $this->verifyAndUpload($request, 'icon', 'upload/category');
            if(File::exists(public_path($request->oldicon))) {
                unlink(public_path($request->oldicon));
            }
        } else {
            $imgUrl2 = $request->oldicon;
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->image = $imgUrl;
        $category->icon = $imgUrl2;
        $category->status = $request->status;
        $category->alt = $request->alt;
        $category->metatitle = $request->metatitle;
        $category->metakeywords = $request->metakeywords;
        $category->metadescription = $request->metadescription;
        $category = $category->save();

        if($category){
            return redirect()->route('admin.category.index')->with('success','Successfullly Updated');
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
    public function destroy(Request $request, $id)
    {
        if($request->routename == 'admin.category.deletedrecords'){
            $id = Crypt::decryptString($id);
            $del = Category::onlyTrashed()->find($id)->forceDelete();
            if($del){
                 return redirect()->back()->with('message','Successfully Delete');
             } else {
                 return redirect()->back()->with('danger','Something Went Wrong');
             } 
        } else {
            $id = Crypt::decryptString($id);
           $del = Category::destroy($id);
           if($del){
                return redirect()->back()->with('message','Successfully Delete');
            } else {
                return redirect()->back()->with('danger','Something Went Wrong');
            }
        }
    }

    public function restorerecords($eid){
        $id = Crypt::decryptString($eid);
        $del = Category::withTrashed()->find($id)->restore();
        if($del){
            return redirect()->back()->with('message','Successfully Restore');
        } else {
            return redirect()->back()->with('danger','Something Went Wrong');
        }
    }

    public function deletedrecords(){
        $category =  Category::onlyTrashed()->paginate(15);
        return view('back.category.index',compact('category'));
    }
}
