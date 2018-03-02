@extends('layouts.app')
@section('title', 'Nouveau Entité') 
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
        <form action="{{ url('entites/store') }}" method="POST" enctype="multipart/form-data" id="FormValidation">
            {{ csrf_field() }}
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">bookmark</i>
                </div>
                <div class="card-content">

                    <h4 class="card-title">Ajouter une Entité</h4>
                    <div class="form-group label-floating">
                        <label class="control-label">
                            Nom
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required="true">
                    </div>

                    <div class="form-group form-file-upload">
                            <input type="file" name="image_url">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Image du Entité">
                                <span class="input-group-btn input-group-s">
                                    <button type="button" class="btn btn-just-icon btn-round btn-info">
                                        <i class="material-icons">image</i>
                                    </button>
                                </span>
                            </div>
                        </div>

                    <div class="form-group label-floating">
                        <label class="control-label">
                            Adresse
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" required="true">
                    </div>                    

                    <div class="form-footer text-right">
                        <input type="submit" class="btn btn-info btn-block" name="submit" value="Ajouter">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection