@extends('layouts.app')
@section('title', 'Detail Entité') 
@section('content')
<div class="cards">
    <div class="container">
        <div class="title">
            <h3>Detail Cards</h3>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-profile">
                    <div class="card-header card-header-image">
                        <img class="img-raised rounded img-fluid" src="{{ asset('storage/'.$entite->logo) }}" alt="{{ $entite->logo }}" style="width:300px;height:300px;">
                        <br>
                        <div class="card-title text-gray">
                            ID : {{ $entite->id}}
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-info">Nom : {{ $entite->nom}}</h6>
                        <p class="card-description">
                            Adresse : {{ $entite->adresse}}
                        </p>
                        <p class="card-description">
                            Date Creation : {{ $entite->created_at}}
                        </p>
                        <p class="card-description">
                            Date Mise a Jour : {{ $entite->updated_at}}
                        </p>
                        <a href="{{ route('entites.edit', $entite->id) }}" class="btn btn-info btn-round">UPDATE</a>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection