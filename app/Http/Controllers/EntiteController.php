<?php

namespace App\Http\Controllers;

use App\Entite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Session;

class EntiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_entites = Entite::orderBy('id', 'desc')->paginate(3);
        return view('entites.index', ['list_entites' => $list_entites]);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entites.create');
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
            'nom' => 'required|max:255',
            'image_url'  => 'required',
            'adresse'  => 'required|max:100'
        ]);

        //Store Data to Databse        
        $entite = new Entite();

        $entite->nom = $request->input('nom');

        if($request->hasFile('image_url')) {
            $path = $request->image_url->store('images/entites');
            $entite->logo_reduit = $path;
            $entite->logo = $path;            
        }

        $entite->adresse = $request->input('adresse');
        $entite->save();

        //Msg
        Session::flash('success', 'Entity was successfully saved!');

        //Redirect to current entite
        // return redirect()->route('entites.show', $entite->id);
        return redirect()->route('entites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entite = Entite::find($id);
        return view('entites.show')->withEntite($entite);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entite = Entite::find($id);
        return view('entites.edit')->withEntite($entite);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate Form Data
        $this->validate($request, [
            'nom' => 'required|max:255',
            //'image_url'  => 'required',
            'adresse'  => 'required|max:100'
        ]);

        //Save Data
        $entite = Entite::find($id);

        $entite->nom = $request->input('nom');

        if($request->hasFile('image_url')) {
            @unlink('storage/'.$entite->logo);
            $path = $request->image_url->store('images/entites');
            $entite->logo_reduit = $path;
            $entite->logo = $path;            
        }
        else {
            $entite->logo_reduit = $request->input('image_url_old');
            $entite->logo = $request->input('image_url_old');
        }

        $entite->adresse = $request->input('adresse');
        $entite->save();

        //set flash data with success message
        Session::flash('success', 'Entite Successfully Updated.');

        //Redirect with flash data to entitesshow    
        return redirect()->route('entites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entite = Entite::find($id);
        $users = User::all();
        $isValid = true;
        foreach($users as $user) {
            if($user->entitee == $entite->id){
                $isValid = false;
            }
        }

        if($isValid) {
            $entite->delete();
            @unlink('storage/'.$entite->logo);
                    
            Session::flash('success', 'Entite Successfully Deleted!.');
        }
        else {
            Session::flash('error', 'Vous ne pouvez pas supprimer cet Entité, une clé etrangére et utilisé sur une autre table ');
            // $errors[0] = '';
            // array_push($errors, 'Cannot delete or update a parent row: a foreign key constraint fails');
        }
        //dd($isValid);


        return redirect()->route('entites.index');    
    }
}
