<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Post;
use App\Models\Postfaq;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Setting;
use App\Traits\ImageTrait;

use App\Events\PostEvent;
use View;

class PostController extends Controller
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
        // $category = Category::where
        $post = Post::with('category')->paginate(15);
        return view('back.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('back.post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $inputs = $request->all();
        $inputs['slug'] = Str::slug($inputs['slug']);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug'  => 'required|string|max:255|unique:posts,slug',
            'image' => 'required|mimes:jpeg,jpg,png,gif,webp|required|max:10000',
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
        
        $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/post');

        $post = new Post;
        $post->title            = $request->title;
        $post->slug             = $inputs['slug'];
        $post->image            = $imgUrl;
        $post->alt              = $request->alt;
        $post->category_id      = $request->category;
        $post->company_id       = $request->company;
        $post->product_id       = $request->product;
        $post->status           = $request->status;
        $post->description      = $request->description;
        $post->metatitle        = $request->metatitle;
        $post->metakeywords     = $request->metakeywords;
        $post->metadescription  = $request->metadescription;

        $posts= $post->save();

        if($request->tag){
            $mytags = $request->tag;
            $myArray = explode(',', $mytags);
            foreach($myArray as $list){
                $mytag =trim($list);
                $tag = Tag::firstOrNew(['name' =>  $mytag]);
                $tag->name = $mytag;
                $tag->slug  = $mytag;
                $post->tags()->save($tag);
            }
        
        }
        $data = ['title'=>$request->title,'slug'=>$inputs['slug']];

        event(new PostEvent($data));

        if($post){
            return redirect()->route('admin.posts.index')->with('success','Successfullly Added');
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
        $category = Category::get();
        $post = Post::with(['faq','category','company','product'])->find($id);
     
        return view('back.post.edit',compact('post','category'));
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
        $inputs = $request->all();
        $inputs['slug'] = Str::slug($inputs['slug']);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug'  => 'required|string|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif,webp|max:10000',
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
        if ($request->file('image') != null) {
            if(File::exists(public_path($request->oldimage))) {
                unlink(public_path($request->oldimage));
            }
            $imgUrl = $this->verifyAndUpload($request, 'image', 'upload/post');
        } else {
            $imgUrl = $request->oldimage;
        }

        $post = Post::find($id);
        $post->title            = $request->title;
        $post->slug             = $request->slug;
        $post->image            = $imgUrl;
        $post->alt              = $request->alt;
        $post->category_id      = $request->category;
        $post->company_id       = $request->company;
        $post->product_id       = $request->product;
        $post->status           = $request->status;
        $post->description      = $request->description;
        $post->metatitle         = $request->metatitle;
        $post->metakeywords      = $request->metakeywords;
        $post->metadescription   = $request->metadescription;

        $posts= $post->save();

        Taggable::where('taggable_id', $id)->delete();

        if($request->tag){
            $mytags = $request->tag;
            $myArray = explode(',', $mytags);
            foreach($myArray as $list){
                if($list != '' || $list != null){
                    $mytag =trim($list);
                    $tag = Tag::firstOrNew(['name' =>  $mytag]);
                    $tag->name = $mytag;
                    $tag->slug  = $mytag;
                    $post->tags()->save($tag);
                }

            }
        
        }
       

        if($post){
            return redirect()->route('admin.posts.index')->with('success','Successfullly Added');
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
        $post = Post::with(['faq','tags'])->findorFail($id);
        if($post->image){
           $image_path = public_path().'/'. $post->image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        } 
        
        $post->tags()->delete();
        $post->faq()->delete();
        $post->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }


    public function savefaq(Request $req){
        $id = Crypt::decryptString($req->postid);
        $q = $req->question;
        $a = $req->answer;
        $check = Postfaq::where('post_id',$id)->count();
        if($check > 0){
            Postfaq::where('post_id',$id)->delete();
        }
        if(!empty($q)){
            $len = count($q);
            for($i=0;$i<$len;$i++){
                if(!empty($q[$i])){
                    Postfaq::insert([
                    'question' => $q[$i],
                    'answer' => $a[$i],
                    'post_id' => $id
                    ]);    
                }
            }
            return redirect()->back()->with('success','Faq Added Successfully');
        }
        return redirect()->back();
    }

}
