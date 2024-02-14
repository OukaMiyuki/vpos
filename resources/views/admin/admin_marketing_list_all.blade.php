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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Extra Pages</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Invoice</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('admin.marketing.dashboard.list') }}" class="dropdown-item">Lihat Semua Data</a>
                                </div>
                            </div>
                            <h4 class="header-title mb-3">Tabel User Marketing</h4>
                            <div class="table-responsive">
                                <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Whatsapp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=0; @endphp
                                        @foreach($userMarketing as $usrMarketing)
                                            <tr>
                                                <td>{{ $no+=1 }}</td>
                                                <td>
                                                    @if(!empty($usrMarketing->detailUser->nama_lengkap))
                                                        {{ $usrMarketing->detailUser->nama_lengkap }}
                                                    @endif
                                                </td>
                                                <td>{{ $usrMarketing->email }}</td>
                                                <td>{{ $usrMarketing->phone }}</td>
                                                <td>
                                                    @if (!empty($usrMarketing->detailUser->jenis_kelamin))
                                                        {{ $usrMarketing->detailUser->jenis_kelamin }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($usrMarketing->is_active == 1)
                                                        <strong>Aktif</strong>
                                                    @else
                                                        <strong>Tidak Aktif</strong>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.marketing.dashboard.list.account.activation', ['id'=>$usrMarketing->id]) }}">
                                                        @if($usrMarketing->is_active == 1)
                                                            <button title="Non Aktifkan" type="button" class="btn btn-warning rounded-circle waves-effect waves-light"><span class="mdi mdi-power"></span></button>&nbsp;
                                                        @else
                                                            <button title="Aktifkan" type="button" class="btn btn-success rounded-circle waves-effect waves-light"><span class="mdi mdi-power"></span></button>&nbsp;
                                                        @endif
                                                    </a>
                                                    <a href="{{ route('admin.marketing.dashboard.list.detail', ['id'=>$usrMarketing->id]) }}">
                                                        <button title="Lihat detail user" type="button" class="btn btn-info rounded-circle waves-effect waves-light"><span class="mdi mdi-eye"></span></button>&nbsp;
                                                    </a>
                                                    <button title="Hapus user" type="button" class="btn btn-danger rounded-circle waves-effect waves-light"><span class="mdi mdi-trash-can"></span></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container -->
    </div>
@endsection