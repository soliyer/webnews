<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ["except" => ["index" , "show"]]);   // for building exception
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = post::all();  instead of all we can use orderBy to order the files

        // $post = DB::select('SELECT * FROM posts'); we can also use db
        $post = Post::orderBy('created_at' , 'desc')->paginate(10);
        // $post = Post::orderBy('title' , 'desc')->take(1)->get(); to limit it
        return view('posts.index')->with('postm',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => "image|nullable|max:1999"
        ]);

        //Handle file upload

        if($request->hasFile("cover_image")){
            //Get the file name with Extension
            $fileNameWithExt = $request->file("cover_image")->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
            //Get the Extension
            $extension = $request->file("cover_image")->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename ."_".time()."_".$extension;
            //Upload image
            $path = $request->file("cover_image")->storeAs("public/cover_images" , $fileNameToStore);
        }else{
            $fileNameToStore = "noimage.jpg";
        }
        $post = new Post;
        $post->user_id=auth()->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect("/posts")->with("success" , "Post Created");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post=Post::find($id);
        return view('posts.show')->with("postes" , $Post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Post=Post::find($id);
        //Check for user id
        if(auth()->user()->id !== $Post->user_id ){
            return redirect('/posts')->with("error" , "Unauthorized Page");

        }
        return view('posts.edit')->with("posted" , $Post);
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
        ]);

        if($request->hasFile("cover_image")){
            //Get the file name with Extension
            $fileNameWithExt = $request->file("cover_image")->getClientOriginalName();
            //Get the file name
            $filename = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
            //Get the Extension
            $extension = $request->file("cover_image")->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename ."_".time()."_".$extension;
            //Upload image
            $path = $request->file("cover_image")->storeAs("public/cover_images" , $fileNameToStore);
        }

        $post = Post::Find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile("cover_image")){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect("/posts")->with("success" , "Post Updated ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Check for user id
        if(auth()->user()->id !== $post ->user_id ){
            return redirect('/posts')->with("error" , "Unauthorized Page");

        }

        if($post->cover_image != "noimage.jpg"){
            //Delete image
            Storage::delete("public/cover_images/" . $post->cover_image);
        }

        $post->delete();
        return redirect("/posts")->with("success", "Post Removed");
    }
}
