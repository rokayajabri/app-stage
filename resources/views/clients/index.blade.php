@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Clients</h3>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add Client</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <form method="GET" action="{{ route('search.client') }}">
            @csrf
            <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
            <input type="text" class="form-control floating" name="id" value="{{ request('id') }}">
            <label class="focus-label">ID</label>
            </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">

                        <input type="text" class="form-control floating" name="q" value="{{ request('Client_Principale') }}">
                        <label class="focus-label">Client</label>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">

                        <input type="text" class="form-control floating" name="ville" value="{{ request('ville') }}">
                        <label for="city" class="focus-label">City</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button type="sumit" class="btn btn-success btn-block"> Search </button>
                </div>
            </div>
        </form>
         <!-- /Search Filter -->
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Societe</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>E-mail</th>
                                    <th>Note</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client )
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->Client_Principale}}</td>
                                        <td>{{$client->Client_Societe}}</td>
                                        @if($client->villes)
                                        <td >{{$client->villes->Ville_Nom}}</td>
                                        @else
                                            <td>aucune ville </td>
                                        @endif

                                        <td >{{$client->Client_Tel}}</td>
                                        <td>{{$client->Client_Emails}}</td>
                                        <td>{{$client->Client_Note}}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$client->id.'" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item userDelete" href="#" data-toggle="modal" ata-id="'.$client->id.'" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
            <!-- Add User Modal -->
            <div id="add_user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('clients.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="Client_Principale" name="Client_Principale" value="{{old('Client_Principale')}}" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Societe</label>
                                        <input class="form-control" type="text" id="Client_Societe" name="Client_Societe" value="{{old('Client_Societe')}}" placeholder="Enter Societe">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>City</label>
                                        <input class="form-control" type="text" id="Client_Ville" name="Client_Ville" value="{{old('$Client_Ville')}}" placeholder="Enter City">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Phone</label>
                                        <input class="form-control" type="number" id="Client_Tel" name="Client_Tel" value="{{old('Client_Tel')}}" placeholder="Enter Phone">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" type="mail" id="Client_Emails" name="Client_Emails" value="{{old('Client_Emails')}}" placeholder="Enter E-mail">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Note</label>
                                        <input class="form-control" type="text" id="Client_Note" name="Client_Note" value="{{old('Client_Note')}}" placeholder="Enter Note">
                                    </div>
                                </div>

                                <br>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add User Modal -->

            <!-- Edit User Modal -->
        <div id="edit_client" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-body">
                        <form action="{{ route('clients.update',$client->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" id="Client_Principale" name="Client_Principale" value="{{$client->Client_Principale}}" placeholder="Edit client"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Societe</label>
                                    <input class="form-control" type="text" id="Client_Societe" name="Client_Societe" value="{{$client->Client_Societe}}" placeholder="Edit societe"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" id="Client_Ville" name="Client_Ville" value="{{$client->villes->Ville_Nom}}" placeholder="Edit City"/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone</label>
                                    <input class="form-control" type="number" id="Client_Tel" name="Client_Tel" value="{{$client->Client_Tel}}" placeholder="Edit Phone">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="mail" id="Client_Emails" name="Client_Emails" value="{{$client->Client_Emails}}" placeholder="Edit E-mail">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Note</label>
                                    <input class="form-control" type="text" id="Client_Note" name="Client_Note" value="{{$client->Client_Note}}" placeholder="Edit Note">
                                </div>
                            </div>


                            <br>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Salary Modal -->
         <!-- Delete User Modal -->
         <div class="modal custom-modal fade" id="delete_client" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Client</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('clients.delete',$client->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" class="e_id" value="">
                                <input type="hidden" name="avatar" class="e_avatar" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete User Modal -->

@endsection
