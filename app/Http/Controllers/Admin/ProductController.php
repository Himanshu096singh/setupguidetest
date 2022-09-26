<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Productfaq;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use View;

class ProductController extends Controller
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
       $product = Product::with('faqs','category','company')->get(); 
       return view('back.product.index',compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $category = Category::where('status',1)->get();
        // $category = Category::where('status',1)->get();
      return view('back.product.create',compact('category'));
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
            'name' => 'required|max:255',
            'slug' => 'required | unique:companies',
            'image' => 'required | mimes:jpeg,jpg,png,gif,webp|required|max:10000',
            'category' => 'required',
            'company' => 'required',
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

        $imgUrl = "upload/product/" . strtolower($imgName);
        $request->image->move(public_path('upload/product'), $imgName);

        $product = new Product;
        $product->name          = $request->name;
        $product->slug          = $request->slug;
        $product->image         = $imgUrl;
        $product->alt           = $request ->alt;
        $product->category_id   = $request->category;
        $product->company_id    = $request->company;
        $product->status        = $request->status;
        $product->description   = $request->description;
        $product->metatitle     = $request->metatitle;
        $product->metakeywords  = $request->metakeywords;
        $product->metadescription   = $request->metadescription;
        $product = $product->save();

        if($product){
            return redirect()->route('admin.product.index')->with('success','Successfullly Added');
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
        
        $product = Product::with('faqs')->find($id);
        $category = Category::where('status',1)->get();
        return view('back.product.edit',compact('product','category'));

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
            'alt' => 'required',
            'category' => 'required',
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

            $imgUrl = "upload/product/" . strtolower($imgName);
            $request->image->move(public_path('upload/product'), $imgName);
            
            if(File::exists(public_path($request->oldimage))) {
                unlink(public_path($request->oldimage));
            }
            
        } else {
            $imgUrl = $request->oldimage;
        }

        $product = Product::find($id);
        $product->name              = $request->name;
        $product->slug              = $request->slug;
        $product->image             = $imgUrl;
        $product->alt               = $request ->alt;
        $product->category_id       = $request->category;
        $product->company_id        = $request->company;
        $product->status            = $request->status;
        $product->description       = $request->description;
        $product->metatitle         = $request->metatitle;
        $product->metakeywords      = $request->metakeywords;
        $product->metadescription   = $request->metadescription;
        $product = $product->save();

        if($product){
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
    public function destroy(Request $request, $id)
    {
       $id = Crypt::decryptString($id);
        if($request->routename == 'admin.company.deletedrecords'){
          
            $del = Company::onlyTrashed()->find($id)->forceDelete();
            if($del){
                 return redirect()->back()->with('success','Successfully Delete');
             } else {
                 return redirect()->back()->with('danger','Something Went Wrong');
             } 
        } else {
            $del = Company::destroy($id);
           if($del){
                return redirect()->back()->with('success','Successfully Delete');
            } else {
                return redirect()->back()->with('danger','Something Went Wrong');
            }
        }
   
        
    }

    public function restorerecords($eid){
        $id = Crypt::decryptString($eid);
        $del = Company::withTrashed()->find($id)->restore();
        if($del){
            return redirect()->back()->with('message','Successfully Restore');
        } else {
            return redirect()->back()->with('danger','Something Went Wrong');
        }
    }

    public function deletedrecords(){
        $company =  Company::onlyTrashed()->paginate(15);
        return view('back.company.index',compact('company'));
    }

    public function getcompany(Request $req){
        $id = $req->values;
        return $company = Category::with('companies')->where('id',$id)->first();
    }

    public function getproduct(Request $req){
        $id = $req->values;
        return $company = Company::with('products')->where('id',$id)->first();
    }

    public function savefaq(Request $req){
        $id = Crypt::decryptString($req->productid);
        $q = $req->question;
        $a = $req->answer;
        $check = Productfaq::where('product_id',$id)->count();
        if($check > 0){
            Productfaq::where('product_id',$id)->delete();
        }
        if(!empty($q)){
            $len = count($q);
            for($i=0;$i<$len;$i++){
                if(!empty($q[$i])){
                    Productfaq::insert([
                    'question' => $q[$i],
                    'answer' => $a[$i],
                    'product_id' => $id
                    ]);    
                }
            }
            return redirect()->back()->with('success','Faq Added Successfully');
        }
        return redirect()->back();
    }

}
