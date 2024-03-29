@extends('layout_dashboard')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                <li class="breadcrumb-item active">Contacts List</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Merchant List</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-md-8">
                                    <form class="d-flex flex-wrap align-items-center">
                                        <label for="inputPassword2" class="visually-hidden">Search</label>
                                        <div class="me-3">
                                            <input type="search" class="form-control my-1 my-md-0" id="inputPassword2" placeholder="Search...">
                                        </div>
                                        <label for="status-select" class="me-2">Sort By</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-md-0" id="status-select">
                                                <option selected="">All</option>
                                                <option value="1">Name</option>
                                                <option value="2">Post</option>
                                                <option value="3">Followers</option>
                                                <option value="4">Followings</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-md-end mt-3 mt-md-0">
                                        <button type="button" class="btn btn-success waves-effect waves-light me-1"><i class="mdi mdi-cog"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
                                    </div>
                                </div><!-- end col-->
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row -->        

            <div class="row">
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <a href="{{ route('marketing.dashboard.merchant.detail') }}"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button></a>&nbsp;
                                <a href="{{ route('marketing.dashboard.tenant.detail') }}"><button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button></a>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Toko Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-4">
                    <div class="text-center card">
                        <div class="card-body">
                            <div class="pt-2 pb-2">
                                <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">User Kopi Waru</a></h4>
                                <p class="text-muted">Merchant Representative<span> | </span> <span> <a href="#" class="text-pink">Andy Suherman</a> </span></p>

                                <div class="row mt-1">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h4>XFGR2</h4>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Merchant Detail</button>&nbsp;
                                <button type="button" class="btn btn-light btn-sm waves-effect">User Detail</button>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h4>Rp. 1.000.000,00</h4>
                                            <p class="mb-0 text-muted text-truncate">Total Penarikan</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div> <!-- end .padding -->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="text-end">
                        <ul class="pagination pagination-rounded justify-content-end">
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end row -->
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection