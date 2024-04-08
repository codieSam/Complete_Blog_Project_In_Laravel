<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function post_page(){
        return view('admin.post_page');
    }

    public function add_post(Request $request){

        //to take a data from another table named as 'user';

        $user = Auth()->user();

        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;



        $post = new Post; 

        $post->title = $request->title;
        $post->description	= $request->description;
        $post->post_status = 'active';

        $post->usertype = $usertype;
        $post->name = $name;
        $post->user_id = $user_id;

// getting the image into the public folder----------------------------
       
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image = $imagename;
        }

        
// storing the image into the database--------------------------------



        $post->save();

        return redirect()->back()->with('message','Post added successfully');
        
        // $post->image = $request->image;
    }
    


    public function show_posts(){

        $post = Post::all();


        return view ('admin.show_posts', compact('post'));
    }

    public function delete_post($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('message','Post deleted successfuly');
    }

    public function edit_page($id){

        $post = Post::find($id);
        return view('admin.edit_page',compact('post'));
    }

    public function update_post(Request $request,$id){


        $data = Post::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect(url('/show_posts'))->with('message','Post updated sucessfully !');

    }
}
