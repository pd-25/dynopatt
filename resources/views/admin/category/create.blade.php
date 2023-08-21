@extends('layouts.app')
@section('title', 'Create Category')

@section('content')
    @include('admin.category.header.categoryHeader')

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form action="{{ route('categories.store') }}" method="POST" id="needs-validation">
                @csrf
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Category Name</label>
                                <input type="text" name="catagory_name" class="form-control" id="validationCustom01"
                                    placeholder="Category Name" value="{{ old('catagory_name') }}" required>
                                @error('catagory_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Category Slug(unique for each category)</label>
                                <input type="text" name="catagory_slug" class="form-control" id="validationCustom02"
                                    placeholder="category-slug" value="{{ old('catagory_slug') }}" required>
                                @error('catagory_slug')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="card-footer bg-transparent mt-3">
                            <button class="btn btn-primary" type="submit">Publish</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
