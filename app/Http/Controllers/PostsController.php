<?php

namespace App\Http\Controllers;


use App\Post;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use Auth;
use Carbon\Carbon;

class PostsController extends Controller
{

      public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->published()->paginate(10);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this ->validate($request,['title'=>'required','body'=>'required','slug'=>'required','published_at'=>'required|date']);
      /*  $posts = $request->input('title');
        $posts = str_slug($request->input('slug'));
        $posts = $request->input('body');
        $posts = $request->input('published_at');*/

       
      // $input = Post::create($request->all());

           /* if ($request->hasFile('thumbnail'))
            {
    
            $file = $request->file('thumbnail');
            $name =  time() . '-' . $file->getClientOriginalName();
            // $file->move(public_path() . '/images/', 'myfile.jpg');
            /* return [
                 'path'=> $file->getRealPath(),
                 'size'=> $file->getSize(),
                 //'mime'=> $file->getMimeType(),
                 'name'=> $file->getClientOriginalName(),
                 'extension'=> $file->getClientOriginalExtension()
             ];*/
             //$destinationPath = public_path() . '/images/';
           // dd($file);
          //  $$posts = $file->move(public_path() . '/images/', $name);
          

      //  }
             if ($request->hasFile('thumbnail'))
            {
            $file = $request->file('thumbnail');
            $name =  time() . '-' . $file->getClientOriginalName();
            $image = $file->move('images/', $name);
            }
          
              $post = new Post(array(
             'title' => $request->get('title'),
             'slug'  => str_slug($request->get('slug')),
             'body'  => $request->get('body'),
             'thumbnail'=>$image,
             'user_id'=>Auth::user()->id,
             'published_at'  => $request->get('published_at'),
            
            ));
            $post->save();

           /* $file = $request->file('thumbnail');
            $imageName = time() . '-' . $file->getClientOriginalName();
            //$request->file('thumbnail');
            $image = $file->move(public_path() . 'images/', $imageName);*/
            
    
        //$input('published_at')=Carbon::now();
        
        //$input = $request->all();
       
        flash()->success('Įrašas sukurtas!');
        return redirect('/blog');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug,$id)
    {
        $post = Post::find($id);
       
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
