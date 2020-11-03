@extends('layouts.admin')
@section('contents')
<div class="main-panel">
    <div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">ORDER DETAILS</h4>
						{{-- <ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
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
								<a href="#">Basic Tables</a>
							</li>
						</ul> --}}
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Order # {{{$order->id}}}</div>
								</div>
								<div class="card-body">
									<div class="card-sub">									
										<strong>Customer Address:</strong><br>
                                        <strong>Name: </strong><p>{{$order->name}}</p>
                                        <strong>Address: </strong><p>{{$order->address}}, {{$order->district}}, {{$order->state}}, {{$order->country}}, {{$order->pincode}}</p>
                                        <strong>Contact: </strong><p>{{$order->email}} | {{$order->phone}}</p>
									</div>
                                    <div class="card-sub">									
										<strong>Payment Details:</strong><br>
                                        <strong>Amount: </strong><p>₹{{$payment->amount}}</p>
                                        <strong>Payment ID: </strong><p>{{$payment->id}}</p>
                                        {{-- <strong>Payment Status: </strong><p>{{$payment->amount}}</p> --}}
                                        <strong>Paid On: </strong><p>{{$payment->updated_at}}</p>
									</div>
									<table class="table  table-head-bg-info  mt-3">
										<thead>
											<tr>
												<th scope="col">Product ID</th>
                                                <th scope="col"></th>
												<th scope="col">Name</th>
												<th scope="col">Quantity</th>
												<th scope="col">Total Price</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($cart_items as $item)
                                             <tr>
												<td>{{$item->id}}</td>
                                                <td>{{$item->image}}</td>
												<td>{{$item->name}}</td>
												<td>{{$item->quantity}}</td>
												<td>{{$item->price}}</td>
											</tr>  
                                            @endforeach

										</tbody>
									</table>
                                    @if (!$order->accepted)
                                    <div class="card-sub">
                                        <a href="/admin/acceptOrder/{{$order->id}}" class="btn btn-success">
                                                <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                Accept Order & Ship
                                        </a>
                                    </div> 
                                    @else
                                      <div class="card-sub">
                                        <button href="#" class="btn btn-info" disabled>
                                                <span class="btn-label">
                                                    <i class="fa fa-truck"></i>
                                                </span>
                                                Order Completed
                                        </button>
                                    </div>     
                                    @endif

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
	<!--   Core JS Files   -->
	<script src="/admin/js/core/jquery.3.2.1.min.js"></script>
	<script src="/admin/js/core/popper.min.js"></script>
	<script src="/admin/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
@endsection