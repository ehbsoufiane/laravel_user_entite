@extends('layouts.app')
@section('title', 'List Entités') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="red">
                <i class="material-icons">person</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Table Utilisateurs</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>UserName</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Entité</th>
                                <th>Téléphone</th>
                                <th>Status</th>
                                <th>Avatar</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_Users as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->nom }}</td>
                                <td>{{ $row->prenom }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ substr($row->password, 0, 5) }} {{ strlen($row->password) > 5 ? "..." : "" }}</td>
                                <td>{{ $row->entitee }}</td>
                                <td>{{ $row->numero_tel }}</td>
                                <td> 
                                    @if($row->active == 1)
                                        <span class="label label-success">Active</span>
                                    @else    
                                        <span class="label label-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('storage/'.$row->avatar) }}" alt="{{ $row->avatar }}" style="width:45px;height:50px;">
                                </td>
                                <td class="td-actions text-right">                                    
                                    <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <a href="{{ route('users.show', $row->id) }}" rel="tooltip" class="btn btn-info btn-tooltip" data-toggle="tooltip" data-placement="left" title="Detail User" data-container="body">
                                            <i class="material-icons">list</i>
                                        </a>
                                        
                                        <a href="{{ route('users.edit', $row->id) }}" rel="tooltip" class="btn btn-success btn-tooltip" data-toggle="tooltip" data-placement="top" title="Edit User" data-container="body">
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
                            {!! $list_Users->links(); !!}
                        </div>
                </div>
            </div>
@endsection