@extends('admin_dashboard')
@section('admin')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ !empty($adminData->photo) ? Storage::url('images/profile/'.$adminData->photo) : asset('assets/images/blank_profile.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            <h4 class="mb-0">{{ $adminData->detailUser->nama_lengkap }}</h4>
                            <p class="text-muted">{{ $adminData->name }}</p>
                            @if($adminData->is_active == 1)
                                <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Aktif</button>
                            @else 
                                <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Tidak Aktif</button>
                            @endif
                            <div class="text-start mt-3">
                                {{-- <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva D. McKnight</span></p> --}}
                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{ $adminData->phone }}</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ $adminData->email }}</span></p>
                                <p class="text-muted mb-1 font-13"><strong>Status :</strong> <span class="ms-2">@if($adminData->is_active == 0)Tidak Aktif @else <strong>Aktif</strong> @endif</span></p>
                            </div>
                            {{-- <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-fill navtab-bg">
                                <li class="nav-item">
                                    <a href="#settings" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                        Account Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        Detail Information
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="settings">
                                    <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Modify Account</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="username" id="username" required value="{{ $adminData->name }}" placeholder="Masukkan username akun">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" required value="{{ $adminData->email }}" placeholder="Masukkan email akun">
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        {{-- end row --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" required value={{ $adminData->phone }} placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="example-select" class="form-label">Status Akun</label>
                                                    <select class="form-select" id="example-select" name="status" required>
                                                        <option value="">- Pilih status akun -</option>
                                                        <option @if($adminData->is_active == 0) selected  @endif value="0">0</option>
                                                        <option @if($adminData->is_active == 1) selected  @endif value="1">1</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="example-fileinput" class="form-label">Default file input</label>
                                                    <input type="file" id="image" class="form-control" name="photo">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="example-fileinput" class="form-label"></label>
                                                    <img id="showImage" src="{{ asset('assets/images/blank_profile.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="aboutme">
                                    <form method="post" action="{{ route('admin.profile.info.store') }}">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Update Informasi User</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required value="{{ $adminData->detailUser->nama_lengkap }}" placeholder="Masukkan username akun">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end tab-content -->
                        </div>
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col -->
            </div>
            <!-- end row-->
        </div>
        <!-- container -->
    </div>
@endsection