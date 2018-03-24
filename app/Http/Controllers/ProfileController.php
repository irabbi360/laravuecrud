<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(){
        return view('myprofile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        $user = Auth::user();
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );

            $user->avatar = $filename;
        }
        $user->name = $request->name;
        $user->save();

        return view('myprofile', array('user' => Auth::user()) );

    }

/*    public function index()
    {
        return view('myprofile');
    }*/


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
   /* public function update(Request $request, $id)
    {
        $image = User::find($id);
        if ($request->hasFile('image')) {
            $dir = 'uploads/';
            if ($image->image != '' && File::exists($dir . $image->image))
                File::delete($dir . $image->image);
            $extension = strtolower($request->file('image')->getClientOriginalExtension());
            $fileName = str_random() . '.' . $extension;
            $request->file('image')->move($dir, $fileName);
            $image->image = $fileName;
        } elseif ($request->remove == 1 && File::exists('uploads/' . $image->image)) {
            File::delete('uploads/' . $image->post_image);
            $image->image = null;
        }
        $image->name = $request->name;
        $image->save();
        return redirect('/myprofile');
    }*/

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
