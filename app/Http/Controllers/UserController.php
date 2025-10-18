<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        $users=DB::select('SELECT * FROM users');

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
          //validation .. the required fields that should not be left empty
          $this->validate($request, [
            'post_title'=>'required',
            'post_type'=>'required',
            'extra_info'=>'required',
            'post_image'=>'image|max:1999|nullable'
        ]);

         //for the posts image
         if ($request->hasFile('post_image')) {
            # get file name with extension
            $filenameWithExt=$request->file('post_image')->getClientOriginalName();
            //get file name
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get ext
            $extension=$request->file('post_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload the image
            $path=$request->file('post_image')->storeAs('public/post_images/', $fileNameToStore);
        }

        $post= Post::find($id);
        $post->post_title=$request->input('post_title');
        $post->post_type=$request->input('post_type');
        $post->extra_info=$request->input('extra_info');
        $post->user_id=auth()->user()->id;
        $post->post_image= $fileNameToStore;
        $post->save();

        return redirect('post')->with('success', 'Post Updated Successfull!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
