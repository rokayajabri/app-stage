@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Product</h3>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add Product</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <form method="GET" action="{{ route('search.product') }}">
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

                        <input type="text" class="form-control floating" name="q" value="{{ request('q') }}">
                        <label class="focus-label">Product Reference</label>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label for="categorie" class="focus-label">Category</label>
                        <select class="form-control" id="categorie" name="categorie">
                            <option value="" selected></option>
                            @foreach($Cathegories as $cathegorie)
                            <option value="{{$cathegorie->Cath_Nom}}" @if(request('categorie')==$cathegorie->Cath_Nom)
                                selected @endif>{{$cathegorie->Cath_Nom}}</option>
                            @endforeach
                        </select>
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
                                <th>Reference de Produit</th>
                                <th>Categorie</th>
                                <th>Description</th>
                                <th class="text-right">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <td>{{$produit->id}}</td>
                                <td>{{$produit->Produit_Ref}}</td>
                                @if($produit->cathegories)
                                <td>{{$produit->cathegories->Cath_Nom}}</td>
                                @else
                                    <td>categorie non disponible</td>
                                @endif
                                <td >{{$produit->Produit_Description}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$produit->id.'" data-target="#edit_produit"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item userDelete" href="#" data-toggle="modal" ata-id="'.$produit->id.'" data-target="#delete_produit"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
     <!-- Add produit Modal -->
     <div id="add_user" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST"  action="{{ route('produits.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Product Reference</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"  id="Produit_Ref" name="Produit_Ref" value="{{old('Produit_Ref')}}" placeholder="Enter Product">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>New Category</label>
                                <input class="form-control" type="text" id="Nouvelle_Cathegorie" name="Nouvelle_Cathegorie" value="{{old('Nouvelle_Cathegorie')}}" placeholder="Enter New Category">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="select"  id="Produit_Cath" name="Produit_Cath">
                                        <option value="" selected disabled hidden>All categories</option>
                                            @foreach($Cathegories as $cathegorie)
                                                <option value="{{$cathegorie->Cath_Nom}}">{{$cathegorie->Cath_Nom}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Description</label>
                                <input class="form-control" type="text" id="Produit_Description" name="Produit_Description" value="{{old('Produit_Description')}}" placeholder="Enter Description">
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
<div id="edit_produit" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>

            <div class="modal-body">
                <form method="POST" action="{{ route('produits.update',$produit->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Product Reference</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"  id="Produit_Ref" name="Produit_Ref" value="{{$produit->Produit_Ref}}" placeholder="Edit Product">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Category</label>
                            <select class="select"  id="Produit_Cath" name="Produit_Cath">
                                <option value="" selected disabled hidden>All categories</option>
                                    @foreach($Cathegories as $cathegorie)
                                        <option value="{{$cathegorie->Cath_Nom}}">{{$cathegorie->Cath_Nom}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Description</label>
                            <input class="form-control" type="text" id="Produit_Description" name="Produit_Description" value="{{$produit->Produit_Description}}" placeholder="Edit Description">
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

<!-- Delete User Modal -->
<div class="modal custom-modal fade" id="delete_produit" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Produit</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('produits.delete',$produit->id)}}" method="POST">
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
