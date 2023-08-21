@extends('layouts.app')
@section('title', 'Edit Category')

@section('content')
    @include('admin.category.header.categoryHeader')

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form action="{{ route('categories.update', $category->catagory_slug) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Category Name</label>
                                <input type="text" name="catagory_name" class="form-control" id="validationCustom01"
                                    placeholder="Category Name" value="{{ $category->catagory_name }}" required>
                                @error('catagory_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class=" text-center card-footer bg-transparent mt-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection
