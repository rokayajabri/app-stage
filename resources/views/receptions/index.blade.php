@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Receptions</h3>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add Reception</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <form method="GET" action="{{ route('search.reception') }}">
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

                        <input type="text" class="form-control floating" name="client" value="{{ request('client') }}">
                        <label class="focus-label">Client</label>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">

                        <input type="date" class="form-control floating" name="date" value="{{ request('date') }}">
                        <label for="focus-label" class="focus-label">Date</label>
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
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Client Principale</th>
                                    <th>Societe</th>
                                    <th>Ville</th>
                                    <th>Qantite</th>
                                    <th>Transport</th>
                                    <th>Note</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receptions as $reception)
                                    <tr>
                                        <td>{{$reception->id}}</td>
                                        <td>{{$reception->BR_Date}}</td>
                                        @if($reception->clients)
                                        <td>{{$reception->clients->Client_Principale}}</td>
                                        @else
                                            <td>client non disponible</td>
                                        @endif
                                        @if($reception->clients)
                                        <td>{{$reception->clients->Client_Societe}}</td>
                                        @else
                                            <td>societe non disponible</td>
                                        @endif
                                        @if($reception->clients)
                                        <td>{{$reception->clients->villes->Ville_Nom}}</td>
                                        @else
                                            <td>societe non disponible</td>
                                        @endif

                                        <td>{{$reception->BR_Qte}}</td>
                                        @if($reception->transports)
                                        <td >{{$reception->transports->Transport_Nom}}</td>
                                        @else
                                            <td>transport non disponible</td>
                                        @endif

                                        <td >{{$reception->BR_Note}}</td>

                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$reception->id.'" data-target="#edit_recept"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item userDelete" href="#" data-toggle="modal" ata-id="'.$reception->id.'" data-target="#delete_reception"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                            <h5 class="modal-title">Add New Client in Reception</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('receptions.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="date" id="BR_Date" name="BR_Date" value="{{old('BR_Date')}}" placeholder="Enter date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="BR_Client">{{__('Client Principale :')}}</label>
                                        <select class="select" id="BR_Client" name="BR_Client">
                                            <option value="" selected disabled hidden>All Clients</option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->Client_Principale}}">{{$client->Client_Principale}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Qantite</label>
                                        <input class="form-control" type="number" id="BR_Qte" name="BR_Qte" value="{{ old('BR_Qte', 1) }}" min="1" step="1" placeholder="Enter qantite">
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Transport</label>
                                            <input class="form-control" type="text" id="BR_Transporte" name="BR_Transporte" value="{{old('BR_Transporte')}}" placeholder="Enter transport">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Societe</label>
                                        <input class="form-control" type="text" id="Client_Societe" name="Client_Societe" value="{{old('Client_Societe')}}" placeholder="Enter societe">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" type="text" id="Client_Ville" name="Client_Ville" value="{{old('Client_Ville')}}" placeholder="Enter city">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Product</label>
                                            <select class="select" id="dBR_Produit" name="dBR_Produit">
                                                <option value="" selected disabled hidden>All products</option>
                                                @foreach($produits as $produit)
                                                    <option value="{{$produit->Produit_Ref}}">{{$produit->Produit_Ref}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>SN</label>
                                        <input class="form-control" type="number" id="dBR_SN" name="dBR_SN" value="{{old('dBR_SN')}}" placeholder="Enter SN">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Etat reparation</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="dBR_Etat_Reparation" name="dBR_Etat_Reparation" value="{{old('dBR_Etat_Reparation', 'en cours')}}" >
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Accessoire</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="dBR_Accessoires" name="dBR_Accessoires" value="{{old('dBR_Accessoires')}}" placeholder="Enter Accessoire">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Accessoire</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="dBR_Accessoires" name="dBR_Accessoires" value="{{old('dBR_Accessoires')}}" placeholder="Enter Accessoire">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label >Note</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="BR_Note" name="BR_Note" value="{{old('BR_Note')}}" placeholder="Enter note" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label >No Document</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="BR_NoDocument" name="BR_NoDocument" value="{{old('BR_NoDocument')}}" placeholder="Enter No Document" >
                                    </div>

                                    <div class="col-sm-6">
                                        <label >Garantie</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="radio" style="width: 5%" id="dBR_Garantie" name="dBR_Garantie" value="{{old('dBR_Garantie')}}" >
                                    </div>
                                </div>
                                <br>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn" name="action" value="add" >Ajouter</button>
                                    <button type="submit" class="btn btn-primary submit-btn" name="action" value="valider">Valider</button>
                                </div>
                            </form>
                            <table border="1px" style="margin-left: 5%" >
                                <thead >
                                    <tr>
                                        <th >No</th>
                                        <th>Date</th>
                                        <th>Client Principale</th>
                                        <th>Societe</th>
                                        <th>ville</th>
                                        <th>Qantite</th>
                                        <th>Transport</th>
                                        <th>Note</th>

                                    </tr>
                                </thead>
                                @if(!is_null($TemporaryTables) && count($TemporaryTables)>0)
                                <tbody>
                                    @foreach ($TemporaryTables as $Temporary)
                                        <tr>
                                            <td>{{$Temporary->id}}</td>
                                            <td>{{$Temporary->BR_Date}}</td>
                                            @if($Temporary->clients)
                                            <td>{{$Temporary->clients->Client_Principale}}</td>
                                            @else
                                                <td>client non disponible</td>
                                            @endif
                                            @if($Temporary->clients)
                                            <td>{{$Temporary->clients->Client_Societe}}</td>
                                            @else
                                                <td>societe non disponible</td>
                                            @endif

                                            @if($Temporary->clients)
                                            <td>{{$Temporary->clients->villes->Ville_Nom}}</td>
                                            @else
                                                <td>societe non disponible</td>
                                            @endif

                                            <td>{{$Temporary->BR_Qte}}</td>
                                            @if($Temporary->transports)
                                                <td >{{$Temporary->transports->Transport_Nom}}</td>
                                                @else
                                                    <td>transport non disponible</td>
                                                @endif


                                            <td >{{$Temporary->BR_Note}}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p></p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add User Modal -->

             <!-- Edit User Modal -->
        <div id="edit_recept" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Reception</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                    <div class="modal-body">
                        <form action="{{ route('receptions.update', $reception->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control" type="text" id="BR_Date" name="BR_Date" value="{{$reception->BR_Date}}" placeholder="Edit date"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Client</label>
                                    <select class="select" id="BR_Client" name="BR_Client">
                                        <option value="" selected disabled hidden>Toutes les Clients</option>
                                        @foreach($clients as $client)
                                        <option value="{{$client->id}}" @if($client->id == $reception->BR_Client) selected @endif>{{$client->Client_Principale}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Qantite</label>
                                    <input class="form-control" type="number" id="BR_Qte" name="BR_Qte" value="{{$reception->BR_Qte}}" placeholder="Edit qantite"/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Transport</label>
                                    <input class="form-control" type="text" id="BR_Transporte" name="BR_Transporte" value="{{$reception->transports->Transport_Nom}}" placeholder="Edit transport">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <input class="form-control" type="mail"  id="BR_Note" name="BR_Note" value="{{$reception->BR_Note}}" placeholder="Edit Note">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>No Document</label>
                                    <input class="form-control" type="text" id="BR_NoDocument" name="BR_NoDocument" value="{{$reception->BR_NoDocument}}" placeholder="Edit No Document">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        </select>
                                        <label>Product</label>
                                        <select class="select" id="dBR_Produit" name="dBR_Produit">
                                            <option value="" selected disabled hidden>All products</option>
                                            @foreach($produits as $produit)
                                                <option value="{{$produit->Produit_Ref}}">{{$produit->Produit_Ref}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>No Document</label>
                                    <input class="form-control" type="text" id="dBR_SN" name="dBR_SN" value="" placeholder="Edit SN">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        </select>
                                        <label>Garantie</label>
                                        <input class="form-control" type="radio" id="dBR_Garantie" name="dBR_Garantie" value="" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Accessoire</label>
                                    <input class="form-control" type="text" id="dBR_Accessoires" name="dBR_Accessoires" value="" placeholder="Edit Accessoire">
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
<div class="modal custom-modal fade" id="delete_reception" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Produit</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{route('receptions.delete',$reception->id)}}" method="POST">
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
