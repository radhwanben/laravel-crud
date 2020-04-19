<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{

    /**
     * this function will check the user login id with the user_id store in post columns if they are the same 
     * it will get the posts that belogns to user login and show it to him
     */


    public function show(){

        $posts = Post::where('user_id', '=', Auth::user()->id )->get();
        return view('post.show' ,compact('posts' ,$posts));
    }

    public function GetSinglePost($title){
        $post = Post::where('title', $title)->firstOrFail();
        return view('post.single' ,compact('post' ,$post));
    }


    /**
     * this function will load the create post view
     */

    public function create(){
        return view('post.create');
    }

    /**
     * @param $request
     * this fucntion will store a new post i will take the data from the request then saved in posts columns in database
     */

    public function store(Request $request){

        /**
         * @param $request 
         * this is just simple validate if the form have values or no
         */

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'file'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        /**
         * we need to run this commande to create laravel storage php artisan storage:link
         */
        $fileName = null;

        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('storage', $fileName);    
        }

        $post=new Post();
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->user_id =Auth::user()->id;
        $post->photo=$fileName;
        $post->save();
        
        return redirect()->route('MyPosts');
    }

    /**
     * this function will load the edit post view
    */

    public function edit($id){
        $post= Post::find($id);
        return view('post.edit' ,compact('post'));
    }

    /**
     * @param $request $id
     * this fucntion will upadate a post  belong to $id it will  take the data from the request then saved in posts columns in database
     */

    public function update(Request $request ,$id)
	{
        $request->validate([
                'file'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

        $fileName = null;
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('storage', $fileName);    
        }


        $post=Post::find($id);
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->user_id =Auth::user()->id;
        $post->photo=$fileName;
        $post->update();
        
        return redirect()->route('home');
    }

    public function delete($id){
        $post =Post::find($id);
        $post->delete();
       return redirect()->route('MyPosts');
    }

}
