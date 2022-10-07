@extends('admin.layouts.main')

@section('title', __('products.create'))

@section('content')


    <div class="content">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">@lang('Edit')</h1>
            <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.products.index') }}">Back to
                @lang('products.plural')</a>
        </div>
        <form class="card row g-3 my-3" method="POST" action="{{ route('admin.products.update', $product->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body row">

                <div class="col-sm-12">
                    <label for="Name" class="form-label @error('name') is-invalid @enderror">@lang('Name')</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder=""
                        value="{{ old('name', $product->name) }}" required>
                    <div class="invalid-feedback">
                        Valid name is required.
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="Name" class="form-label @error('name') is-invalid @enderror">@lang('Price')</label>
                    <input type="text" class="form-control" id="Price" name="price" placeholder=""
                        value="{{ old('price', $product->price) }}" required>
                    <div class="invalid-feedback">
                        Valid price is required.
                    </div>
                </div>
                <div class="col-12">
                    <label for="category_id" class="form-label">Categories</label>
                    <select class="form-select" name="category_id" id="category_id"  required>
                        @foreach ($category_id as $category)
                            <option @selected($category->id ) value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Valid Skill is required.
                    </div>
                </div>
                <div class="col-12">
                    <label for="image" class="form-label">@lang('Image')</label>
                    <input type="file" class="form-control" id="image" name="image" aria-label="Image"
                        value="{{ old('image', $product->image) }}">
                    <img class="img-thumbnail" width="50%" src="{{ url($product->image) }}" alt="">
                    <div class="invalid-feedback">
                        Valid Image is required.
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
            </div>
        </form>
        <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.products.index') }}">Back to
            @lang('products.plural')</a>

    </div>

@endsection
