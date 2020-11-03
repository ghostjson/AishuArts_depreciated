@extends('layouts.admin')
@section('contents')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PRODUCTS LIST</h4>
                {{-- <ul class="breadcrumbs">
                    <li class="nav-home">
                        
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul> --}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    {{-- <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="basic-datatables_length">
                                                <label>Show 
                                                    <select name="basic-datatables_length" aria-controls="basic-datatables" class="form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="basic-datatables_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="basic-datatables">
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}
                        <div class="row">
                            <div class="col-sm-12">
                              <table id="basic-datatables" class="table-head-bg-info display table table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row"><th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 134px;">ID</th><th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 214px;">Name</th><th class="sorting_desc" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" aria-sort="descending" style="width: 97px;">Description</th><th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 32px;">Price</th><th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 89px;">In Stock</th><th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 85px;">Added On</th><th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 85px;">Actions</th></tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Customer Name</th><th rowspan="1" colspan="1">Phone</th><th rowspan="1" colspan="1">Address</th><th rowspan="1" colspan="1">Date</th><th rowspan="1" colspan="1">Actions</th></tr>
                                    </tfoot> --}}
                                    <tbody>   
                                    @foreach ($products as $product)
                                    <tr role="row" class="even">
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->price}}</td>
                                            
                                            @if ($product->active)
                                                <td>Yes</td>
                                            @else
                                                <td>No</td>
                                            @endif
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                    <div class="form-button-action">
															<a href="/admin/product/{{$product->id}}/edit"  class="btn btn-link btn-primary btn-lg">
																<i class="fa fa-edit"></i>
															</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @include('admin/partials/scripts') --}}
	<!--   Core JS Files   -->
	<script src="/admin/js/core/jquery.3.2.1.min.js"></script>
	<script src="/admin/js/core/popper.min.js"></script>
	<script src="/admin/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="/admin/js/plugin/datatables/datatables.min.js"></script>
{{-- @include('admin/partials/datatable-scripts') --}}
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });
</script>
@endsection