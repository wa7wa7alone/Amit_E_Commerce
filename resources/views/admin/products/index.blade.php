@extends('admin.layouts.main')

@section('title', __('skills.plural'))

@section('content')


    <div class="content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product</h1>
            <a class="btn btn-primary" href="{{ route('admin.products.create') }}"><i data-feather="plus"></i>
                Create</a>
        </div>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr id="tr-row-{{ $product->id }}">
                        <td>
                            <input class="row-bulk-delete" type="checkbox" name="id[]" value="{{ $product->id }}"
                                id="input-row-{{ $product->id }}" />
                        </td>
                        <td>
                            <label for="input-row-{{ $product->id }}">
                                {{ $product->id }}
                            </label>
                        </td>
                        <td>
                            <label for="input-row-{{ $product->id }}">
                                {{ $product->name }}
                            </label>
                        </td>
                        <td>
                            <label for="input-row-{{ $product->id }}">
                                {{ $product->price }}
                            </label>
                        </td>
                        <td>
                            <label for="input-row-{{ $product->id }}">
                                @php
                                @endphp
                                <a href="{{ route('admin.categories.show', $product->category_id) }}">
                                    @php
                                        $x=App\Models\Category::where('id','=',$product->category_id)->get('name');
                                        echo $x;
                                    @endphp
                                     </a>
                            </label>
                        </td>
                        <td>
                            <label for="input-row-{{ $product->id }}">
                                <img class="img-thumbnail" width="200"
                                    src="{{ url('storage/' . str_replace('public', '', $product->image)) }}"
                                    alt="{{ $product->name }}">
                            </label>
                        </td>

                        <td>
                            <a class="p-2 btn btn-primary show" data-id="{{ $product->id }}"
                                href="{{ route('admin.products.show', $product->id) }}">
                                <i data-feather="eye" class="material-icons opacity-10">visibility</i>
                            </a>
                            @if (Auth::user()->role == 'admin')
                                <a class="p-2 btn btn-warning edit" data-id="{{ $product->id }}"
                                    href="{{ route('admin.products.edit', $product->id) }}">
                                    <i data-feather="edit" class="material-icons opacity-10">edit</i>
                                </a>
                                <form class="delete-form d-inline-block" data-name="{{ $product->name }}"
                                    action="{{ route('admin.products.destroy', $product->id) }}" method="post"
                                    id="{{ $product->id }}" class="form-horizontal d-inline-block">
                                    @method('DELETE')
                                    {{-- <input type="hidden" name="_method" value="DELETE" /> --}}
                                    @csrf
                                    <button class="p-2 btn btn-danger delete" data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}">
                                        <i data-feather="trash-2" class="material-icons opacity-10">delete</i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $products->appends(Request::all())->links() !!}
        {{-- {{ $skills->links('vendor.pagination.bootstrap-5') }} --}}
    </div>
@endsection
