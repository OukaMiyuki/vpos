@extends('layout_dashboard')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active">Calendar</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Tenant List</h4>
                        </div>
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
                            <h4 class="header-title mb-3">Tenant List</h4>
                            <div class="responsive-table-plugin">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Email</th>
                                                    <th>Whatsapp</th>
                                                    <th>Join Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no=0;
                                                @endphp
                                                @foreach ($userTenant as $tenant)
                                                    <tr>
                                                        <td>{{ $no+=1 }}</td>
                                                        <td>{{ $tenant->detailUser->nama_lengkap }}</td></td>
                                                        <td>andy@gmail.com</td>
                                                        <td>087998823432</td>
                                                        <td>20-01-2023</td>
                                                        <td>
                                                            <a title="Merchant Detail" href="{{ route('marketing.dashboard.merchant.detail') }}" class="btn btn-xs btn-info"><i class="mdi mdi-storefront-outline"></i></a>&nbsp;&nbsp;
                                                            <a title="Tenant Detail" href="{{ route('marketing.dashboard.tenant.detail') }}" class="btn btn-xs btn-success"><i class="mdi mdi-account"></i></a>
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
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container -->
    </div>
@endsection