<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();    
    }


    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        $profile->update($request->all());

        return $profile;
    }

    public function store(Request $request)
    {
        $profile = User::create($request->all());
        return $profile;
    }

    public function destroy($id)
    {
        $profile = User::findOrFail($id);
        $profile->delete();
        return '';
    }
}
