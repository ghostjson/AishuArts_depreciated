@extends('layouts.ecommerce')

@section('contents')
        <!-- Page title -->
        @include('partials.title')
        <!-- end: Page title -->
        <div id="productsList">
        @include('partials.products')
        </div>
@endsection
