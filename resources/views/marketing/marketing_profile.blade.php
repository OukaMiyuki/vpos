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
                            @if (auth()->user()->type == "super_admin")
                                <img src="{{ !empty($marketingData->photo) ? Storage::url('images/profile/'.$marketingData->photo) : asset('assets/images/blank_profile.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            @elseif (auth()->user()->type == "marketing")
                                <img src="{{ !empty(auth()->user()->photo) ? Storage::url('images/profile/'.auth()->user()->photo) : asset('assets/images/blank_profile.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                            @endif
                            <h4 class="mb-0">
                                @if (auth()->user()->type == "super_admin")
                                    {{ $marketingData->detailUser->nama_lengkap }}
                                @elseif(auth()->user()->type == "marketing")
                                    {{ auth()->user()->detailUser->nama_lengkap }}
                                @endif
                            </h4>
                            <p class="text-muted">
                                @if (auth()->user()->type == "super_admin")
                                    {{ $marketingData->username }}
                                @elseif(auth()->user()->type == "marketing")
                                    {{ auth()->user()->username }}
                                @endif
                            </p>
                            @if (auth()->user()->type == "super_admin")
                                @if($marketingData->is_active == 1)
                                    <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Aktif</button>
                                @else 
                                    <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Tidak Aktif</button>
                                @endif
                            @elseif(auth()->user()->type == "marketing")
                                @if(auth()->user()->is_active == 1)
                                    <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Aktif</button>
                                @else 
                                    <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Tidak Aktif</button>
                                @endif
                            @endif
                            <div class="text-start mt-3">
                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">@if (auth()->user()->type == "super_admin"){{ $marketingData->phone }}@elseif(auth()->user->type == "marketing"){{ auth()->user()->phone }} @endif</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">@if (auth()->user()->type == "super_admin"){{ $marketingData->email }}@elseif(auth()->user->type == "marketing"){{ auth()->user()->email }} @endif</span></p>
                            </div>
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
                                    <form method="post" action="{{ route('admin.marketing.dashboard.list.detail.account.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Modify Account</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="hidden" class="form-control" name="id" id="id" required value="@if (auth()->user()->type == "super_admin"){{ $marketingData->id }}@elseif(auth()->user->type == "marketing"){{ auth()->user()->id }} @endif">
                                                    <input type="text" class="form-control" name="username" id="username" required value="@if (auth()->user()->type == "super_admin"){{ $marketingData->username }}@elseif(auth()->user->type == "marketing"){{ auth()->user()->username }} @endif" placeholder="Masukkan username akun">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" required value="@if (auth()->user()->type == "super_admin"){{ $marketingData->email }}@elseif(auth()->user->type == "marketing"){{ auth()->user()->email }} @endif" placeholder="Masukkan email akun">
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        {{-- end row --}}
                                        <div class="row">
                                            <div class="@if (auth()->user()->type == "super_admin") col-md-6 @else col-md-12 @endif">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" required value="@if (auth()->user()->type == "super_admin"){{ $marketingData->phone }}@elseif(auth()->user->type == "marketing"){{ auth()->user()->phone }} @endif" placeholder="Enter email">
                                                </div>
                                            </div>
                                            @if (auth()->user()->type == "super_admin")
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Status Akun</label>
                                                        <select class="form-select" id="example-select" name="status" required>
                                                            <option value="">- Pilih status akun -</option>
                                                            <option @if($marketingData->is_active == 0) selected  @endif value="0">0</option>
                                                            <option @if($marketingData->is_active == 1) selected  @endif value="1">1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="photo" class="form-label">Upload Foto Profil</label>
                                                    <input type="file" id="image" class="form-control" name="photo" accept="image/*">
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
                                    <form method="post" action="{{ route('admin.marketing.dashboard.list.detail.info.store') }}">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Update Informasi User</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="hidden" class="form-control" name="id" id="id" required value="@if (auth()->user()->type == "super_admin"){{ $marketingData->detailUser->id }}@elseif(auth()->user->type == "marketing"){{ auth()->user()->detailUser->id }} @endif">
                                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required value="@if(auth()->user()->type == "super_admin") {{ $marketingData->detailUser->nama_lengkap }} @elseif(auth()->user()->type == "marketing") {{ auth()->user()->detailUser->nama_lengkap }} @endif" placeholder="Masukkan nama lengkap">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="no_ktp" class="form-label">Nomor KTP</label>
                                                    <input type="text" class="form-control" name="no_ktp" id="no_ktp" required value="@if(auth()->user()->type == "super_admin") {{ $marketingData->detailUser->no_ktp }} @elseif(auth()->user()->type == "marketing") {{ auth()->user()->detailUser->no_ktp }} @endif" placeholder="Masukkan nomor KTP">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required value="@if(auth()->user()->type == "super_admin") {{ $marketingData->detailUser->tempat_lahir }} @elseif(auth()->user()->type == "marketing") {{ auth()->user()->detailUser->tempat_lahir }} @endif" placeholder="Masukkan tempat lahir">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" @if(auth()->user()->type == 'super_admin') value="{{ $marketingData->detailUser->tanggal_lahir }}" @elseif(auth()->user()->type == 'marketing') {{ auth()->user()->detailUser->tanggal_lahir }} @endif placeholder="Masukkan tanggal lahir" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                                        <option value="">- Pilih jenis kelamin -</option>
                                                        @if (auth()->user()->type == "super_admin")
                                                            <option @if($marketingData->detailUser->jenis_kelamin == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
                                                            <option @if($marketingData->detailUser->jenis_kelamin == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                                                        @elseif(auth()->user()->type == "marketing")
                                                            <option @if(auth()->user()->detailUser->jenis_kelamin == "Laki-laki") selected @endif value="Laki-laki">Laki-laki</option>
                                                            <option @if(auth()->user()->detailUser->jenis_kelamin == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea placeholder="Masukkan alamat anda" class="form-control" id="alamat" name="alamat" rows="5" spellcheck="false" required>@if(auth()->user()->type == "super_admin") {!! $marketingData->detailUser->alamat !!} @elseif(auth()->user()->type == "marketing") {!! auth()->user()->detailUser->alamat !!} @endif</textarea>
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