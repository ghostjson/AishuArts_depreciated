@extends('layouts.admin')
@section('contents')
<div class="main-panel">
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Product</div>
                    </div>
                    <form action="/admin/product/create" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 col-lg-8">
                                <div class="form-group">
                                    <label for="disableinput">Product Name</label>
                                    <input type="text" class="form-control" id="disableinput" placeholder="Enter product name" name="name" >
                                </div>
                                <div class="form-check">
                                    <label>In-Stock ?</label><br/>
                                    <label class="form-radio-label">
                                        <input class="form-radio-input" type="radio" name="active" value="1"  checked="">
                                        <span class="form-radio-sign">Yes</span>
                                    </label>
                                    <label class="form-radio-label ml-3">
                                        <input class="form-radio-input" type="radio" name="active" value="0">
                                        <span class="form-radio-sign">No</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Product Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Add Product Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₹</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Amount (to the nearest rupees)" name="price" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Product Description</label>
                                    <textarea class="form-control" id="comment" rows="5" name="description">

                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <input type="submit" class="btn btn-success">Submit</button>
                        {{-- <button class="btn btn-danger">Cancel</button> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection