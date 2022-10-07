@include('user.layouts.head')
@include('user.layouts.nav')
@section('title', 'Home')

<div class="d-flex justify-content-center flex-wrap pt-5 ">
    {{-- Card --}}
    @include('user.layouts.ProductCard')
</div>



    @extends('user/layouts/footer')
    @section('title', 'favorite')
