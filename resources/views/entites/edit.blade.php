@extends('layouts.app')
@section('title', 'Edit Entité') 
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
        <form action="{{ url('entites/'.$entite->id) }}" method="POST" enctype="multipart/form-data" id="FormValidation">

            @method('PUT')
            @csrf

                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">bookmark</i>
                </div>
                <div class="card-content">

                    <h4 class="card-title">Update Entity</h4>
                    <div class="form-group label-floating">
                        <label class="control-label">
                            ID
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="id" value="{{ $entite->id }}" readonly>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">
                            Nom
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="nom" value="{{ old('nom', $entite->nom) }}" required="true">
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
                    <input type="hidden" name="image_url_old" value="{{ $entite->logo }}">

                    <div class="form-group label-floating">
                        <label class="control-label">
                            Adresse
                            <small>*</small>
                        </label>
                        <input type="text" class="form-control" name="adresse" value="{{ old('adresse', $entite->adresse) }}" required="true">
                    </div>                    

                    <div class="form-footer text-right">
                        <input type="submit" class="btn btn-info btn-block" name="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection