@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Session::get('name') }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <div class="dash-widget-info">
                                <h3>112</h3> <h4><span style="padding-right: 80%">Client</span></h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <div class="dash-widget-info">
                                <h3>110</h3><h4><span style="padding-right: 70%">Product</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <div class="dash-widget-info">
                                <h3>37</h3> <h4><span style="padding-right: 60%">Reception</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <div class="dash-widget-info">
                                <h3>118</h3> <h4><span style="padding-right: 60%">Reparation</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Clients</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">

                                                    <a href="client-profile.html">Barry Cuda </a>
                                                </h2>
                                            </td>
                                            <td>barrycuda@example.com</td>
                                            <td>
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Active </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">

                                                    <a href="client-profile.html">Tressa Wexler </a>
                                                </h2>
                                            </td>
                                            <td>tressawexler@example.com</td>
                                            <td>
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-danger"></i> Inactive </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">

                                                    <a href="client-profile.html">Ruby Bartlett </a>
                                                </h2>
                                             </td>
                                            <td>rubybartlett@example.com</td>
                                            <td>
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-danger"></i> Inactive </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">

                                                    <a href="client-profile.html"> Misty Tison </a>
                                                </h2>
                                            </td>
                                            <td>mistytison@example.com</td>
                                            <td>
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Active </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                                        </a> <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">

                                                    <a href="client-profile.html"> Daniel Deacon </a>
                                                </h2>
                                            </td>
                                            <td>danieldeacon@example.com</td>
                                            <td>
                                                <div class="dropdown action-label">
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-danger"></i> Inactive </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"> <a href="clients">View all clients</a> </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Product</h3> </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th> Ref Product </th>
                                            <th>Category</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html">XPB90-09SX1P</a>
                                                </h2>

                                            </td>
                                            <td>

                                                    <h2>
                                                        <a href="project-view.html">Antenne Parabolique</a>
                                                    </h2>

                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html">DM42DN100S [9]</a>
                                                </h2>

                                            </td>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html">Accessoire</a>
                                                </h2>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html">DM24K5H22</a>
                                                </h2>

                                            </td>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html">Television</a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html"> DM43DN100</a>
                                                </h2>

                                            </td>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html">Machine à Laver</a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html"> DM40A35AS [11]</a>
                                                </h2>


                                            </td>
                                            <td>
                                                <h2>
                                                    <a href="project-view.html">Congélateur</a>
                                                </h2>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-pencil m-r-5"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="produits">View all Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
@endsection
