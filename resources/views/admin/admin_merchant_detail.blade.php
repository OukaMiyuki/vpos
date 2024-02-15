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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Product Detail</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product Detail</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="tab-content pt-0">
                                    <div class="tab-pane active show" id="product-1-item">
                                        <img src="{{ asset('assets/images/products/product-9.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="tab-pane" id="product-2-item">
                                        <img src="{{ asset('assets/images/products/product-10.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="tab-pane" id="product-3-item">
                                        <img src="{{ asset('assets/images/products/product-11.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="tab-pane" id="product-4-item">
                                        <img src="{{ asset('assets/images/products/product-12.jpg') }}" alt="" class="img-fluid mx-auto d-block rounded">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-7">
                                <div class="ps-xl-3 mt-3 mt-xl-0">
                                    <a href="#" class="text-primary">Merchant Information</a>
                                    <h4 class="mb-3">Toko Bangunan Surabaya</h4>
                                    <p class="text-muted mb-4">
                                        Sebuah usaha yang menyediakan bahan bangunan untuk keperluan pembangunan, telah berdiri sejak 2011 dan beralamat di Surabaya
                                    </p>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td><p class="text-muted"><i class="mdi mdi-circle-small h6 text-primary me-2"></i> <strong>Invitation Code</strong></p></td>
                                                        <td><p><strong>&nbsp;&nbsp;:&nbsp;</strong></p></td>
                                                        <td><p>XZAJ1</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="text-muted"><i class="mdi mdi-circle-small h6 text-primary me-2"></i> <strong>Nama Marketing</strong></p></td>
                                                        <td><p><strong>&nbsp;&nbsp;:&nbsp;</strong></p></td>
                                                        <td><p>Amar Wibianto</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="text-muted"><i class="mdi mdi-circle-small h6 text-primary me-2"></i> <strong>Nama Usaha</strong></p></td>
                                                        <td><p><strong>&nbsp;&nbsp;:&nbsp;</strong></p></td>
                                                        <td><p>Toko Bangunan Surabaya</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="text-muted"><i class="mdi mdi-circle-small h6 text-primary me-2"></i> <strong>Nama Pemilik Usaha</strong></p></td>
                                                        <td><p><strong>&nbsp;&nbsp;:&nbsp;</strong></p></td>
                                                        <td><p>Andy Suherman</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="text-muted"><i class="mdi mdi-circle-small h6 text-primary me-2"></i> <strong>Alamat</strong></p></td>
                                                        <td><p><strong>&nbsp;&nbsp;:&nbsp;</strong></p></td>
                                                        <td><p>Kompleks Perumahan Surabaya Blok A2 No. 23, Surabaya</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="text-muted"><i class="mdi mdi-circle-small h6 text-primary me-2"></i> <strong>Jenis Usaha</strong></p></td>
                                                        <td><p><strong>&nbsp;&nbsp;:&nbsp;</strong></p></td>
                                                        <td><p>Penjualan Barang Bangunan</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p class="text-muted"><i class="mdi mdi-circle-small h6 text-primary me-2"></i> <strong>Status AMI</strong></p></td>
                                                        <td><p><strong>&nbsp;&nbsp;:&nbsp;</strong></p></td>
                                                        <td><p>Terdaftar</p></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <h3 class="mb-3 mt-3">History Penarikan Dana</h3>
                        </div>

                        <div class="table-responsive mt-4">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Merchant ID</th>
                                        <th>Merchant Name</th>
                                        <th>Cash Out Date</th>
                                        <th>Cash Out Nominal</th>
                                        <th>Marketing Share</th>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
        
    </div> <!-- container -->
@endsection