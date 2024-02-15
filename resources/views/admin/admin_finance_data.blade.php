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
                            <form class="d-flex align-items-center mb-3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control border-0" id="dash-daterange">
                                    <span class="input-group-text bg-blue border-blue text-white">
                                    <i class="mdi mdi-calendar-range"></i>
                                    </span>
                                </div>
                                <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                <i class="mdi mdi-autorenew"></i>
                                </a>
                                <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                                </a>
                            </form>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                        <i class="mdi mdi-cash font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">Rp. <span data-plugin="counterup">3000000</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total penarikan hari ini</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                    </div>
                    <!-- end widget-rounded-circle-->
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-6">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-lg rounded-circle bg-danger border-danger border shadow">
                                        <i class="mdi mdi-cash-multiple font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1">Rp. <span data-plugin="counterup">4000000</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total Saldo</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end row-->
                        </div>
                    </div>
                    <!-- end widget-rounded-circle-->
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->
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
                            <h4 class="header-title mb-3">Finance Data</h4>
                            <div class="responsive-table-plugin">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Merchant ID</th>
                                                    <th>Merchant Name</th>
                                                    <th>Cash Out Date</th>
                                                    <th>Cash Out Nominal</th>
                                                    <th>Marketing Share</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>MR0001</td>
                                                    <td>Toko Bangunan Surabaya</td>
                                                    <td>01-02-2024</td>
                                                    <td>Rp. 2.000.000,00</td>
                                                    <td>Rp. 500,00</td>
                                                    <td><a href="{{ route('admin.marketing.dashboard.list.detail.inv_code.invoice') }}" class="btn btn-xs btn-info"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp;</td>
                                                </tr>
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
