@extends('layouts.app')
@section('title', 'Edit Category')

@section('content')
    @include('admin.category.header.categoryHeader')

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form action="{{ route('categories.update', $category->catagory_slug) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
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
                    {{-- <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Category Slug(unique for each category)</label>
                        <input type="text" name="catagory_slug" class="form-control" id="validationCustom02"
                            placeholder="category-slug" value="{{ $category->catagory_slug }}" required>
                        @error('catagory_slug')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label for="category">Category Type</label>
                        <select id="category" class="custom-select form-control" name="category_type" required>
                            <option value="">Select Course Category</option>
                            <option {{ $category->category_type == 0 ? 'selected' : '' }} value="0">Self Placed Salseforce learning</option>
                            <option {{ $category->category_type == 1 ? 'selected' : '' }} value="1">Live Training</option>
                            <option {{ $category->category_type == 2 ? 'selected' : '' }} value="2">Other</option>
                            
                        </select>

                        @error('category_type')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Objective1</label>
                        <input type="text" name="objective_f" class="form-control" id="validationCustom02"
                            placeholder="objective" value="{{ $category->objective_f }}" required>
                        @error('objective_f')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Objective2</label>
                        <input type="text" name="objective_s" class="form-control" id="validationCustom02"
                            placeholder="objective" value="{{ $category->objective_s }}" required>
                        @error('objective_s')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Objective3</label>
                        <input type="text" name="objective_t" class="form-control" id="validationCustom02"
                            placeholder="objective" value="{{ $category->objective_t }}" required>
                        @error('objective_t')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Objective4</label>
                        <input type="text" name="objective_fo" class="form-control" id="validationCustom02"
                            placeholder="objective" value="{{ $category->objective_fo }}" required>
                        @error('objective_fo')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="category">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control">
                        @error('cover_image')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="category">Current Image</label>

                        @if (isset($category->cover_image) &&
                                !empty($category->cover_image && File::exists(public_path('storage/CateImg/' . $category->cover_image))))
                            <img src="{{ asset('storage/CateImg/' . $category->cover_image) }}" alt="">
                        @else
                            <img src="{{ asset('noimg.png') }}" alt="Image not found">
                        @endif
                    </div>


                    <div class="col-md-12">
                        <label for="productDetails">Category overview</label>
                        <textarea class="form-control p-t-40" id="summernote" name="overview" placeholder="Write Something..." rows="17" required>{{ $category->overview }}</textarea>
                        @error('overview')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-transparent mt-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection
