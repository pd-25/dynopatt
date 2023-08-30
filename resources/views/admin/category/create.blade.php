@extends('layouts.app')
@section('title', 'Create Category')

@section('content')
    @include('admin.category.header.categoryHeader')

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form action="{{ route('categories.store') }}" method="POST" id="needs-validation" enctype="multipart/form-data">
                @csrf
               
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

                            <div class="col-md-6 mb-3">
                                <label for="category">Category Type</label>
                                <select id="category" class="custom-select form-control" name="category_type" required>
                                    <option value="">Select Course Category</option>
                                    <option value="0">Self Placed Salseforce learning</option>
                                    <option value="1">Live Training</option>
                                    <option value="2">Other</option>
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
                                    placeholder="objective" value="{{ old('objective_f') }}" required>
                                @error('objective_f')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Objective2</label>
                                <input type="text" name="objective_s" class="form-control" id="validationCustom02"
                                    placeholder="objective" value="{{ old('objective_s') }}" required>
                                @error('objective_s')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Objective3</label>
                                <input type="text" name="objective_t" class="form-control" id="validationCustom02"
                                    placeholder="objective" value="{{ old('objective_t') }}" required>
                                @error('objective_t')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Objective4</label>
                                <input type="text" name="objective_fo" class="form-control" id="validationCustom02"
                                    placeholder="objective" value="{{ old('objective_fo') }}" required>
                                @error('objective_fo')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="category">Cover Image</label>
                                <input type="file" name="cover_image" class="form-control" required>
                                @error('cover_image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="productDetails">Category overview</label>
                                <textarea class="form-control p-t-40" id="summernote" name="overview" placeholder="Write Something..." rows="17" required></textarea>
                                @error('overview')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   
                    
                        <div class="card-footer bg-transparent mt-3">
                            <button class="btn btn-primary" type="submit">Publish</button>
                        </div>
                 
             
            </form>
        </div>
    </div>
@endsection
