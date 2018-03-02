<?php

namespace App\Http\Controllers;

use App\User;
use App\Entite;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Session;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_Users = User::orderBy('id', 'desc')->paginate(3);
        return view('users.index', ['list_Users' => $list_Users]);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entites = Entite::all();
        return view('users.create')->withEntites($entites);
        // return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Form Data
        $this->validate($request, [
            'username' => 'required|max:100',
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
            'email' => 'required|unique:users|max:100',
            'password' => 'required|max:200',
            'entitee' => 'required',
            'numero_tel' => 'required|max:20',
            'avatar'  => 'required'
        ]);

        //Store Data to Databse        
        $user = new User();

        $user->username = $request->input('username');
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        // $user->password = Hash::make($request->input('password'));
        $user->password = Crypt::encrypt($request->input('password'));
        $user->entitee = $request->input('entitee');
        $user->numero_tel = $request->input('numero_tel');

        if($request->input('statut') == 'on') $user->active = true;
        else $user->active = false;

        if($request->hasFile('avatar')) {
            $path = $request->avatar->store('images/users');
            $user->avatar = $path;           
        }

        $user->save();

        //Msg
        Session::flash('success', 'User was successfully saved!');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->withUser($user);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $entites = Entite::all();
        return view('users.edit', ['user' => $user, 'entites' => $entites]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate Form Data
        $this->validate($request, [
            'username' => 'required|max:100',
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|max:200',
            'entitee' => 'required',
            'numero_tel' => 'required|max:20',
        ]);

        //Store Data to Databse        
        $user = User::find($id);

        $user->username = $request->input('username');
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        // $user->password = Hash::make($request->input('password'));
        $user->password = Crypt::encrypt($request->input('password'));
        $user->entitee = $request->input('entitee');
        $user->numero_tel = $request->input('numero_tel');

        if($request->input('statut') == 'on') $user->active = true;
        else $user->active = false;

        if($request->hasFile('avatar')) {
            @unlink('storage/'.$user->avatar);
            $path = $request->avatar->store('images/users');
            $user->avatar = $path;           
        }
        else {
            $user->avatar = $request->input('avatar_old');
        }

        $user->save();

        //Msg
        Session::flash('success', 'User was successfully saved!');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        @unlink('storage/'.$user->avatar);

        Session::flash('success', 'User Successfully Deleted!.');
        
        return redirect()->route('users.index');    
    }
}
