<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            $post= Post::all();

            $usertype = Auth()->user()->usertype;
            
            if($usertype == 'user'){
                return view('home.homepage',compact('post'));
            }
            else if($usertype == 'admin'){
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }

    // public function post(){
    //     return view ('post');
    // }
    public function homepage(){

        $post = Post::all();

        return view('home.homepage',compact('post'));
    }

    public function read_post($id){
        $post = Post::find($id);
        return view('home.read_post',compact('post'));
    }

    public function create_post(){
        
        return view('home.create_post');
    }

    public function user_post(Request $request){


        // At first getting data from another table 'user'

        $user = Auth::user();

        $userid = $user->id;
        $username = $user->name;
        $usertype = $user->usertype;


        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->name = $request->name;
        $post->post_status = $request->post_status;
        $post->usertype = $request->usertype;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $imagename = time().'.'.$file->getClientOriginalExtension();
            $file->move('student',$imagename);
            $post->image = '/student'.$imagename;
        }

        $post->post_status = 'pending';


        //getting data from another table 'user'

        $post->name = $username;
        $post->user_id = $userid;
        $post->usertype = $usertype;


        $post->save();
        return redirect()->back()->with('message','User created the post sucessfully !');
    }
}

