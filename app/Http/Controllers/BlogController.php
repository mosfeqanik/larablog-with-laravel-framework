<?php

namespace App\Http\Controllers;
use App\Category;
use App\blog;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('author',['only'=>['create','store','edit','update']]);
        //except holo baadhe
//        $this->middleware('admin',['except'=>['create','store','edit','update']]);
        $this->middleware('admin',['only'=>['delete','trash','restore','pernamentDelete']]);

    }


    public function index(){
//        $blogs=blog::all();
//        $blogs=blog::latest()->get();
        $blogs=blog::where('status',1)->latest()->get();
        return view('blogs.index',compact('blogs'));
    }
    public function create(){
        $categories=Category::latest()->get();
        return view('blogs.create',compact('categories'));
    }
    public function store(Request $request){
        $input=$request->all();
//        $blog= new blog();
//        $blog->title=$request->title;
//        $blog->body=$request->body;
//        $blog->save();
        //meta stuff
        $input['slug']=str::slug($request->title);
        $input['meta_title']=str::limit($request->title,55);
        $input['meta_description']=str::limit($request->title,150);

          //image upload
            if($file=$request->file('featured_image')){
//                dd( $file->getClientOriginalName(),
//                    $file->getClientOriginalExtension(),
//                    $file->getSize(),
//                    $file->getMimeType());
//                dd( $file->getClientOriginalName());
                $filename=$file->getClientOriginalName();
                $name = uniqid().$filename;
                $file->move('images/Featured_Images/',$name);
//                dd($name);
                $input['featured_image']=$name;
            }
//            $blog=blog::Create($input);
            $blogByUser=$request->user()->blogs()->Create($input);
        //sync with categories
//        dd($request->category_id);
        if($request->category_id){
//            $blog->category()->sync($request->category_id);
            $blogByUser->category()->sync($request->category_id);
        }
        return redirect('blog');
//        dd($blog->title);
//        dd($request->body);
    }
    public function show($id){
        $blog=blog::findOrfail($id);
        return view('blogs.show',compact('blog'));
    }
    public function edit($id){
        $categories=Category::latest()->get();
        $blog=blog::findOrfail($id);

        $blogcategory=array();
        foreach ($blog->category as $category)
        {
            $blogcategory[]=$category->id-1;
        }
        $filltedArray=Arr::except($categories,$blogcategory);
        return view('blogs.edit',['blog'=>$blog,'categories'=> $categories,'filltedArray'=> $filltedArray]);
    }
    public function update(Request $request,$id){
//        dd($request->status);
        $input=$request->all();
        $blog =blog::findOrFail($id);
        $blog->Update($input);
        //Sync Category
        if($request->category_id){
            $blog->category()->sync($request->category_id);
        }
        return redirect('/blog');
//        dd($request->title);
//        dd($request);

    }
    public function delete(Request $request,$id){
        $blog =blog::findOrFail($id);
        $blog->Delete();
        return redirect('/blog');

    }
    public function trash(){
        $trashedBlogs=blog::onlyTrashed()->get();
        return view('blogs.trash',compact('trashedBlogs'));
    }
    public function restore($id){
        $restoredBlog = blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        return redirect('/blog');
    }

    public function pernamentDelete($id){
        $pernamentDeleteBlog = blog::onlyTrashed()->findOrFail($id);
        $pernamentDeleteBlog->forceDelete($pernamentDeleteBlog);
        return back();
    }
}
