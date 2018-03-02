@extends('layouts.app')
@section('title', 'Detail Entité') 
@section('content')
<div class="cards">
    <div class="container">
        <div class="title">
            <h3>Profile Detail</h3>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-profile">
                    <div class="card-avatar">
                        
                        <img class="img" src="{{ asset('storage/'.$user->avatar) }}">
                       
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">ID : {{ $user->id }}</h6>
                        <h4 class="card-title">{{ $user->nom .' '.$user->prenom }}</h4>
                        <h6 class="card-category text-gray">Email : {{ $user->email }}</h6>
                        <h6 class="card-category text-gray">Entité : {{ $user->entitee }}</h6>
                        <h6 class="card-category text-gray">Téléphone : {{ $user->numero_tel }}</h6>
                        <h6 class="card-category text-gray">
                            Status :  
                            @if($user->active == 1)
                            <span class="label label-success">Active</span>
                            @else    
                            <span class="label label-danger">Inactive</span>
                            @endif
                        </h6>
                        <h6 class="card-category text-gray">Date Creation : {{ $user->created_at }}</h6>
                        <h6 class="card-category text-gray">date Dernière Mise a Jour: {{ $user->updated_at }}</h6>

                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-round">UPDATE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection