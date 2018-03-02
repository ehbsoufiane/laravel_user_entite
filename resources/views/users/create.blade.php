@extends('layouts.app')
@section('title', 'Nouveau Entité') 
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
        <form action="{{ url('users/store') }}" method="POST" enctype="multipart/form-data" id="FormValidation">
            {{ csrf_field() }}
                <div class="card-header card-header-icon" data-background-color="red">
                    <i class="material-icons">person</i>
                </div>
                <div class="card-content">

                    <h4 class="card-title">Ajouter un Utilisateur</h4>
                    <div class="form-group label-floating">
                        <label class="control-label">
                            User Name
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required="true">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">
                            Nom
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required="true">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">
                            Prenom
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required="true">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">
                            Email
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" email="true" required="true">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">
                            Password
                            <small>*</small>
                        </label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" required="true">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-3">
                        <select class="selectpicker" name="entitee" id="category-select" data-style="btn btn-danger" title="Entité" data-size="7" required="true">
                            @foreach ($entites as $row)                        
                        <option value="{{ $row->id }}">{{ $row->id .' | '.$row->nom }}</option>
                            @endforeach                                                     
                        </select>
                    </div>

                    <div class="row"></div>

                    <div class="form-group label-floating">
                        <label class="control-label">
                            Numero de Télépone
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="numero_tel" value="{{ old('numero_tel') }}" required="true" number="true">
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-2 label-on-left">Statut</label>
                            <div class="col-sm-10 checkbox-radios">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="statut"> Is Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>                    

                    <div class="form-group form-file-upload">
                        <input type="file" name="avatar">
                        <div class="input-group">
                            <input type="text" readonly="" class="form-control" placeholder="Image du Entité">
                            <span class="input-group-btn input-group-s">
                                <button type="button" class="btn btn-just-icon btn-round btn-danger">
                                    <i class="material-icons">image</i>
                                </button>
                            </span>
                        </div>
                    </div>                

                    <div class="form-footer text-right">
                        <input type="submit" class="btn btn-danger btn-block" name="submit" value="Ajouter">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection