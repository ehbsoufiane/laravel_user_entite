@extends('layouts.app')
@section('title', 'Edit Entité') 
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
        <form action="{{ url('users/'.$user->id) }}" method="POST" enctype="multipart/form-data" id="FormValidation">
            
            @method('PUT')
            @csrf

                <div class="card-header card-header-icon" data-background-color="red">
                    <i class="material-icons">bookmark</i>
                </div>
                <div class="card-content">

                        <h4 class="card-title">Edit un Utilisateur</h4>
                        <div class="form-group label-floating">
                                <label class="control-label">
                                    ID
                                    <small>*</small>
                                </label>
                                <input type="text" class="form-control" name="id" value="{{ $user->id }}" readonly>
                            </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                User Name
                                <small>*</small>
                            </label>
                            <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" required="true">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Nom
                                <small>*</small>
                            </label>
                            <input type="text" class="form-control" name="nom" value="{{ old('nom', $user->nom) }}" required="true">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Prenom
                                <small>*</small>
                            </label>
                            <input type="text" class="form-control" name="prenom" value="{{ old('prenom', $user->prenom) }}" required="true">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Email
                                <small>*</small>
                            </label>
                            <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" required="true" email="true">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Old Password
                                <small>*</small>
                            </label>
                            <input type="text" class="form-control" name="password_old" value="{{ Crypt::decrypt($user->password).' (Just for Test)'  }}">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                New Password
                                <small>*</small>
                            </label>
                            <input type="password" class="form-control" name="password" value="" required="true">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-3">
                                <select class="selectpicker" name="entitee" id="category-select" data-style="btn btn-danger" title="Entité" data-size="7" required="true">
                                    @foreach ($entites as $row)                        
                                <option value="{{ $row->id }}" {{ $row->id == $user->entitee ? "selected" : "" }}>{{ $row->id .' | '.$row->nom }}</option>
                                    @endforeach                                                     
                                </select>
                            </div>
        
                            <div class="row"></div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Numero de Télépone
                                <small>*</small>
                            </label>
                            <input type="text" class="form-control" name="numero_tel" value="{{ old('numero_tel', $user->numero_tel) }}" required="true" number="true">
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 label-on-left">Statut</label>
                                <div class="col-sm-10 checkbox-radios">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="statut" {{ $user->active == 1 ? "checked" : "" }}> Is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <input type="hidden" name="avatar_old" value="{{ $user->avatar }}">                
    
                        <div class="form-group form-file-upload">
                            <input type="file" name="avatar">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Avatar">
                                <span class="input-group-btn input-group-s">
                                    <button type="button" class="btn btn-just-icon btn-round btn-danger">
                                        <i class="material-icons">image</i>
                                    </button>
                                </span>
                            </div>
                        </div>                    

                    <div class="form-footer text-right">
                        <input type="submit" class="btn btn-danger btn-block" name="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection