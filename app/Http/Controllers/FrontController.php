<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Code;
use App\Models\Company;
use App\Models\Sociallink;
use App\Models\Setup;
use App\Models\Product;
use App\Traits\ImageTrait;
use View;


class FrontController extends Controller
{
    use ImageTrait;
    public function __construct()
    {
       $settings = Setting::first();
       $social = Sociallink::get();
       $code = Code::first();
       $rblog = Post::where('status',1)->limit(3)->orderby('id','desc')->get();
       View::share(compact('settings','social','code','rblog'));
    }

    public function index(){
        $category = Category::where('status',1)->get();
        $blog = Post::where('status',1)->limit(3)->orderby('id','desc')->get();
        return view('front.home',compact('category','blog'));
    }

    public function about(){
        return view('front.about');
    }
    public function contact(){
        return view('front.contact');
    }
    public function category(){
        $category = Category::where('status',1)->get();
        return view('front.category',compact('category'));
    }

    public function detail($slug){
        $category = Category::with('companies')->where('slug',$slug)->where('status',1)->firstorfail();
        if($category){
            $meta = [
                'metatitle' => $category->metatitle,
                'metakeywords' => $category->metakeywords,
                'metadescription' => $category->metadescription,
                'image' => '',
                'type' => 'category',
            ];
        }
        return view('front.detail',compact('category','meta'));
    }

    public function blog(){
       $blog = Post::where('status',1)->orderby('id','desc')->get();
       return view('front.blog',compact('blog'));
    }

    public function blogdetail($slug){
        $blog = Post::with('category','faq', 'tags')->where('status',1)->where('slug',$slug)->firstorfail();
        // $blog->description;
        preg_match_all('|<h2 (.*)</h2>|iU', $blog->description, $matches);
        $toc = $matches[0];
        // print_r($matches[0]);
 
        $recent = Post::where('status',1)->where('slug','!=',$slug)->limit(5)->get();
        if($blog){
            $meta = [
                'metatitle' => $blog->metatitle,
                'metakeywords' => $blog->metakeywords,
                'metadescription' => $blog->metadescription,
                'image' => '',
                'type' => 'blog',
            ];
        }
        return view('front.blogdetail',compact('blog','recent','meta','toc'));
    }

    public function companydetail($cateogryslug, $companyslug){
        $company = Company::with('products', 'category','faqs')->where('slug', $companyslug)->where('status',1)->firstorfail();
        $blog = Post::where('status',1)->limit(6)->orderby('id','desc')->get();
        if($company){
            $meta = [
                'metatitle' => $company->metatitle,
                'metakeywords' => $company->metakeywords,
                'metadescription' => $company->metadescription,
                'image' => '',
                'type' => 'company',
            ];
        }
        return view('front.companydetails',compact('company','meta','blog'));
    }

    

    public function productdetails($categoryslug, $compayslug, $productslug){
        $product = Product::with('category','company','faqs')->where('slug', $productslug)->where('status',1)->firstorfail();
        
        if($product){
        $meta = [
            'metatitle' => $product->metatitle,
            'metakeywords' => $product->metakeywords,
            'metadescription' => $product->metadescription,
            'image' => '',
            'type' => 'product',
        ];
    }
    return view('front.productdetails',compact('product','meta'));
    }

    public function setup(){
        $setup = Setup::where('status',1)->orderby('id','desc')->get();
        return view('front.setup',compact('setup'));
    }
    public function setupdetail($slug){
        $setup = Setup::where('status',1)->where('slug',$slug)->firstorfail();
        if($setup){
            $meta = [
                'metatitle' => $setup->metatitle,
                'metakeywords' => $setup->metakeywords,
                'metadescription' => $setup->metadescription,
                'image' => '',
                'type' => 'setup',
            ];
        }
        return view('front.setupdetail',compact('setup'));
    }

    public function submitcontact(Request $req){
        return redirect()->back();
    }

    public function storeImage(Request $request)
    {
        
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = uniqid() . '-' . trim(preg_replace('/[^A-Za-z0-9-]+/', '-', pathinfo($originName, PATHINFO_FILENAME)));
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = strtolower($fileName . '_' . time() . '.' . $extension);
            $request->file('upload')->move(public_path('upload/image'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = '/upload/image/'.$fileName;
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
            return response()->json(['fileName' =>$fileName, 'uploaded'=> 1, 'url' => $url]);
        }

    }
}
