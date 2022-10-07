@include('user.layouts.head')
@include('user.layouts.nav')
@section('title', 'Profile')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <h1 class="font-weight-bold mt-5 mb-4 text-center">My Profile</h1>

        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px" src="{{ url('storage/' . str_replace('public', '', Auth::user()->image)) }}"><span
                    class="font-weight-bold">{{ Auth::user()->name }}</span><span
                    class="text-black-50">{{ Auth::user()->email }}</span><span>
                </span></div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-4 py-5">
                <form class="card row g-3 my-3" method="POST" action="{{ route('user.myaccount.update', $user->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body row">

                        <div class="col-sm-12">
                            <label for="Name"
                                class="form-label @error('name') is-invalid @enderror">@lang('users.name')</label>
                            <input type="text" class="form-control" id="Name" name="name" placeholder=""
                                value="{{ old('name', $user->name ) }}" required>
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">@lang('users.email')</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="you@example.com" value="{{ old('email', $user->email ) }}" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="gender" class="form-label">@lang('users.gender')</label>
                            <select class="form-select" name="gender" id="gender" required>
                                <option @selected(old('gender', $user->gender ) == 'm') value="m">@lang('users.genders.m')</option>
                                <option @selected(old('gender', $user->gender) == 'f') value="f">@lang('users.genders.f')</option>
                            </select>
                            <div class="invalid-feedback">
                                Valid Gender is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="age" class="form-label">@lang('users.age')</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder=""
                                value="{{ old('age',$user->age ) }}" required>
                            <div class="invalid-feedback">
                                Valid age is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">@lang('Image')</label>
                            <input type="file" class="form-control" id="image" name="image" aria-label="Image"
                                value="{{ old('image') }}">
                            <div class="invalid-feedback">
                                Valid Image is required.
                            </div>
                        </div>
                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@extends('user/layouts/footer')
