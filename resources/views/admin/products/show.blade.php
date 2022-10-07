@extends('admin.layouts.main')

@section('title', __('products.show'))

@section('content')

    <div class="content">

        <div class="card row g-3 my-3">
            <div class="card-body row">

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('products.ID')</label>
                    <div class="col-md-10">
                        : {{ $product->id }}
                    </div>
                </div>
                {{-- img show --}}
                <div class="col-12 mb-4 row">
                    <label class="col-md-2">Image</label>
                    <div class="col-md-10">
                        : {{ $product->image }}
                    </div>
                </div>


                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('products.name')</label>
                    <div class="col-md-10">
                        : {{ $product->name }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">Category</label>
                    <div class="col-md-10">

                        : <a href="{{route('admin.categories.show',$product->category_id)}}">{{ $product->category_id }}</a>
                    </div>
                </div>


                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('products.created_at')</label>
                    <div class="col-md-10">
                        : {{ $product->created_at }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('products.updated_at')</label>
                    <div class="col-md-10">
                        : {{ $product->updated_at }}
                    </div>
                </div>

            </div>
        </div>

        <a class="btn btn-secondary float-end" href="{{ url('/admin/products') }}">Back to @lang('products.plural')</a>
    </div>

@endsection
