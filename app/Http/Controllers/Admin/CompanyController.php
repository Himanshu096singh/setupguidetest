<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Companyfaq;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use App\Traits\ImageTrait;
use View;

class CompanyController extends Controller
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
       $company = Company::with('products','category','faqs')->paginate(15); 
       return view('back.company.index',compact('company'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('back.company.create',compact('category'));
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
        $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/company');
        $company = new Company;
        $company->name      = $request->name;
        $company->slug      = $request->slug;
        $company->image     = $imgUrl;
        $company->alt       = $request->alt;
        $company->category_id = $request->category;
        $company->status    = $request->status;
        $company->type     = $request->type;
        $company->headquarter = $request->headquarter;
        $company->ceo       = $request->ceo;
        $company->founder       = $request->founder;
        $company->insceptiondate       = $request->insceptiondate;
        $company->companynumber     = $request->companynumber;
        $company->mosthearedbrand   = $request->mosthearedbrand;
        $company->totalassets       = $request->totalassets;
        $company->history           = $request->history;
        $company->marketshare = $request->marketsharecontent;
        $company->competitoranalysis = $request->competitoranalysis;
        $company->metatitle         = $request->metatitle;
        $company->metakeywords      = $request->metakeywords;
        $company->metadescription   = $request->metadescription;
        $company = $company->save();

        if($company){
            return redirect()->route('admin.company.index')->with('success','Successfullly Added');
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
        $company = Company::withTrashed()->with('products','faqs')->find($id);
        $category = Category::where('status',1)->get();
            return view('back.company.edit',compact('company','category'));
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
            $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/company');
        } else {
            $imgUrl = $request->oldimage;
        }

        if ($request->hasFile('marketshareimage')) {
            $imgUrl1 = $this->verifyAndUpload($request, 'marketshareimage', 'upload/marketshareimage');
        } else {
            $imgUrl1 = $request->oldmarketrshareimage;
        }

        $company = Company::withTrashed()->find($id);
        $company->name      = $request->name;
        $company->slug      = $request->slug;
        $company->image     = $imgUrl;
        $company->category_id = $request->category;
        $company->alt       = $request->alt;
        $company->status    = $request->status;
        $company->type      = $request->type;
        $company->headquarter = $request->headquarter;
        $company->ceo       = $request->ceo;
        $company->founder       = $request->founder;
        $company->insceptiondate       = $request->insceptiondate;
        $company->companynumber     = $request->companynumber;
        $company->mosthearedbrand   = $request->mosthearedbrand;
        $company->totalassets       = $request->totalassets;
        $company->history           = $request->history;
        $company->marketshare       = $request->marketsharecontent;
        $company->namarketshareimageme    = $imgUrl1;
        $company->competitoranalysis = $request->competitoranalysis;
        $company->metatitle         = $request->metatitle;
        $company->metakeywords      = $request->metakeywords;
        $company->metadescription   = $request->metadescription;
        $company = $company->save();

        if($company){
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
           
            $del = Company::find($id);
            $del->faqs()->delete();
            $compdel = Company::faqs()->destroy($id);

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
    
    public function savefaq(Request $req){
        $id = Crypt::decryptString($req->companyid);
        $q = $req->question;
        $a = $req->answer;
        $check = Companyfaq::where('company_id',$id)->count();
        if($check > 0){
            Companyfaq::where('company_id',$id)->delete();
        }
        if(!empty($q)){
            $len = count($q);
            for($i=0;$i<$len;$i++){
                if(!empty($q[$i])){
                    Companyfaq::insert([
                    'question' => $q[$i],
                    'answer' => $a[$i],
                    'company_id' => $id
                    ]);    
                }
            }
            return redirect()->back()->with('success','Faq Added Successfully');
        }
        return redirect()->back();
    }

}
