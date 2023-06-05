@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Reparation</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <!-- Search Filter -->
        <form method="GET" action="{{ route('search.reparation') }}">
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

                        <input type="text" class="form-control floating" name="q" value="{{ request('dBR_Garantie') }}">
                        <label class="focus-label">Garantie</label>

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
                                <th>No DBR</th>
                                <th>No BR</th>
                                <th>Date</th>
                                <th>Client Principale</th>
                                <th>Ville</th>
                                <th>Produit Ref</th>
                                <th>SN</th>
                                <th>Etat de Réparation</th>
                                <th>Garantie</th>
                                <th>Transport</th>
                                <th>Technicien</th>
                                <th>Problémes</th>
                                <th>Détails Réparations</th>
                                <th>Accessoires </th>
                                <th>Remarque</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details_br as $detail_br)
                                <tr>
                                    <td>{{$detail_br->id}}</td>
                                    <td>{{$detail_br->dBR_BR}}</td>
                                    @if($detail_br->BonReception)
                                    <td>{{$detail_br->BonReception->BR_Date}}</td>
                                    @else
                                        <td>aucune date </td>
                                    @endif

                                    @if($detail_br->BonReception)
                                    <td>{{$detail_br->BonReception->Clients->Client_Principale}}</td>
                                    @else
                                        <td>aucune client </td>
                                    @endif

                                    @if($detail_br->BonReception)
                                    <td>{{$detail_br->BonReception->Clients->Villes->Ville_Nom}}</td>
                                    @else
                                        <td>aucune ville </td>
                                    @endif


                                    @if($detail_br->produits)
                                    <td>{{$detail_br->produits->Produit_Ref}}</td>
                                    @else
                                        <td>aucune produit </td>
                                    @endif

                                    <td>{{$detail_br->dBR_SN}}</td>
                                    <td>{{$detail_br->produit_etat_reparation->EtatReparation_Ref}}</td>


                                    <td>{{$detail_br->dBR_Garantie}}</td>

                                    @if($detail_br->BonReception)
                                    <td>{{$detail_br->BonReception->Transports->Transport_Nom}}</td>
                                    @else
                                        <td>aucune transport </td>
                                    @endif

                                    @if($detail_br->techniciens)
                                    <td>{{$detail_br->techniciens->Tech_Name}}</td>
                                    @else
                                        <td>aucune technicien </td>
                                    @endif

                                    <td>{{$detail_br->dBR_Problem}}</td>

                                    <td>{{$detail_br->dBR_RepairDetail}}</td>
                                    <td>{{$detail_br->dBR_Accessoires}}</td>
                                    <td>{{$detail_br->dBR_Note}}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$detail_br->id.'" data-target="#edit_reparation"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item userDelete" href="#" data-toggle="modal" ata-id="'.$detail_br->id.'" data-target="#delete_reparation"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

                    <!-- Edit User Modal -->
                    <div id="edit_reparation" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Reparation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <br>
                                <div class="modal-body">
                                    <form action="{{ route('reparations.update',$detail_br->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Product</label>
                                                    <input class="form-control" type="text" id="dBR_BR" name="dBR_BR" value="{{$detail_br->produits->Produit_Ref}}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>SN</label>
                                                <input class="form-control" type="text" id="dBR_SN" name="dBR_SN" value="{{$detail_br->dBR_SN}}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Client</label>
                                                <input class="form-control" type="text" id="BR_Client" name="BR_Client" value="{{$detail_br->BonReception->Clients->Client_Principale}}" >
                                            </div>
                                            <div class="col-sm-6">
                                                <label>city</label>
                                                <input class="form-control" type="text" id="Client_Ville" name="Client_Ville" value="{{$detail_br->BonReception->Clients->Villes->Ville_Nom}}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control" type="date" id="BR_Date" name="BR_Date" value="{{$detail_br->BonReception->BR_Date}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>No BR</label>
                                                <input class="form-control" type="text" id="dBR_BR" name="dBR_BR" value="{{$detail_br->dBR_BR}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Problem</label>
                                                    <input class="form-control" type="text" id="dBR_Problem" name="dBR_Problem" value="{{$detail_br->dBR_Problem}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Transport</label>
                                                <input class="form-control" type="text" id="BR_Transporte" name="BR_Transporte" value="{{$detail_br->BonReception->Transports->Transport_Nom}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Technicien</label>
                                                <input class="form-control" type="text" id="dBR_Technicien" name="dBR_Technicien" value="">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Detail reparation</label>
                                                <input class="form-control" type="text" id="dBR_RepairDetail" name="dBR_RepairDetail" value="{{$detail_br->dBR_RepairDetail}}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Remarque</label>
                                                    <input class="form-control" type="text" id="dBR_Note" name="dBR_Note" value="{{$detail_br->dBR_Note}}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6" style="padding-bottom: 3px">
                                                <label >Etat reparation</label><br>
                                                <input type="radio" id="etat_reparation_en_cours" name="dBR_Etat_Reparation" value="en cours" @if(old('dBR_Etat_Reparation', $detail_br->Produit_Etat_Reparation->EtatReparation_Ref) === 'en cours') checked @endif>En Cours
                                                <input type="radio" id="etat_reparation_repare" name="dBR_Etat_Reparation" value="repare" @if(old('dBR_Etat_Reparation', $detail_br->Produit_Etat_Reparation->EtatReparation_Ref) === 'repare') checked @endif>Réparé
                                                <input type="radio" id="etat_reparation_repare" name="dBR_Etat_Reparation" value="No repare" @if(old('dBR_Etat_Reparation', $detail_br->Produit_Etat_Reparation->EtatReparation_Ref) === 'No repare') checked @endif>No Réparé
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <label>Garantie</label>
                                            <input class="form-control" type="radio" style="width: 6%" id="dBR_Garantie" name="dBR_Garantie" value="{{$detail_br->dBR_Garantie}}" />
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
<div class="modal custom-modal fade" id="delete_reparation" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Reparation</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('reparations.delete',$detail_br->id)}}" method="POST">
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
