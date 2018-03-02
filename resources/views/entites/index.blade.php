@extends('layouts.app')
@section('title', 'List Entités') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="blue">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Table Entité</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nom</th>
                                <th>Logo</th>
                                <th>Adresse</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_entites as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->nom }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$row->logo) }}" alt="{{ $row->logo }}" style="width:60px;height:45px;">
                                </td>
                                <td>{{ $row->adresse }}</td>
                                <td class="td-actions text-right">
                                     
                                    <form action="{{ route('entites.destroy', $row->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <a href="{{ route('entites.show', $row->id) }}" rel="tooltip" class="btn btn-info btn-tooltip" data-toggle="tooltip" data-placement="left" title="Detail User" data-container="body">
                                            <i class="material-icons">list</i>
                                        </a>
                                        
                                        <a href="{{ route('entites.edit', $row->id) }}" rel="tooltip" class="btn btn-success btn-tooltip" data-toggle="tooltip" data-placement="top" title="Edit User" data-container="body">
                                            <i class="material-icons">edit</i>
                                        </a>

                                        <button type="submit" value="" rel="tooltip" class="btn btn-danger btn-tooltip" onclick="return confirm('Are you sure to delete?')" data-toggle="tooltip" data-placement="top" title="Delete User" data-container="body">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>


                                </td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                    <div class="text-right">
                            {!! $list_entites->links(); !!}
                        </div>
                </div>
            </div>
@endsection