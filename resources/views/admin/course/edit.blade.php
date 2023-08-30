@extends('layouts.app')
@section('title', 'Create Cources')

@section('content')
    @include('admin.course.header.courseHeader')

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Course Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Cource Name"
                                    value="{{ $course->name }}" required>
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category">Course Type</label>
                                <select id="category" class="custom-select form-control" name="type" required>
                                    <option value="">Select Course Category</option>
                                    <option {{ $course->type == 0 ? 'selected' : '' }} value="0">Self Placed Salseforce
                                        learning</option>
                                    <option {{ $course->type == 1 ? 'selected' : '' }} value="1">Live Training</option>
                                </select>

                                @error('type')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom04">Price</label>
                                <input type="text" name="price" value="{{ $course->price }}" class="form-control"
                                    placeholder="$250" required>
                                @error('price')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category">Status</label>
                                <!--<input type="text" class="form-control"  placeholder="Mobile Phones" required>-->
                                <select id="category" name="status" class="custom-select form-control" required>
                                    <option {{ $course->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ $course->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Enroll Bullton url</label>
                                <input type="text" name="enroll_url" value="{{ $course->enroll_url }}"
                                    class="form-control" placeholder="url" required>
                                @error('enroll_url')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category">Category</label>
                                <select id="category" name="category_id" class="custom-select form-control" required>
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option {{ $course->category_id == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->catagory_name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="category">Current Image</label>

                                @if (isset($course->cover_image) &&
                                        !empty($course->cover_image && File::exists(public_path('storage/CourseImage/' . $course->cover_image))))
                                    <img src="{{ asset('storage/CourseImage/' . $course->cover_image) }}" alt="">
                                @else
                                    <img src="{{ asset('noimg.png') }}" alt="Image not found">
                                @endif
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
                                <label for="validationCustom02">Objective1</label>
                                <input type="text" name="objective_f" class="form-control" id="validationCustom02"
                                    placeholder="objective" value="{{ $course->objective_f }}" required>
                                @error('objective_f')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Objective2</label>
                                <input type="text" name="objective_s" class="form-control" id="validationCustom02"
                                    placeholder="objective" value="{{ $course->objective_s }}" required>
                                @error('objective_s')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Objective3</label>
                                <input type="text" name="objective_t" class="form-control" id="validationCustom02"
                                    placeholder="objective" value="{{ $course->objective_t }}" required>
                                @error('objective_t')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Objective4</label>
                                <input type="text" name="objective_fo" class="form-control" id="validationCustom02"
                                    placeholder="objective" value="{{ $course->objective_fo }}" required>
                                @error('objective_fo')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="productDetails">Cource overview</label>
                        <textarea class="form-control p-t-40 editor" name="overview" placeholder="Write Something..." rows="17" required>{{ $course->overview }}</textarea>
                        @error('overview')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <h4><b>Carriculam Section</b></h4>
                    <div class="col-md-12">
                        <div class="row" id="carriculam">
                            @foreach ($course->carriculams as $cari)
                                <div class="col-md-6 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control"
                                        name="addCarricullam[{{ $loop->iteration }}][title]" value="{{ $cari->title }}"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a url.
                                    </div>

                                    <label>Description</label>
                                    <input type="text" class="form-control"
                                        name="addCarricullam[{{ $loop->iteration }}][description]"
                                        value="{{ $cari->description }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a url.
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-6" id="addbutton">
                                <div class="text-center m-5">
                                    <button type="button" class="btn-success"
                                        onclick="addCarricullam({{ $course->carriculams->count() + 1 }})">
                                        Add more</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- faq section --}}
                    <h4><b>Faq Section</b></h4>
                    <div class="col-md-12">
                        <div class="row" id="faq">
                            @foreach ($course->faqs as $faq)
                                <div class="col-md-6 mb-3">
                                    <label>Question</label>
                                    <input type="text" class="form-control"
                                        name="addFaq[{{ $loop->iteration }}][title]" value="{{ $faq->title }}"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a url.
                                    </div>

                                    <label>Answer</label>
                                    <input type="text" class="form-control"
                                        name="addFaq[{{ $loop->iteration }}][description]"
                                        value="{{ $faq->description }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a url.
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-6" id="addFbutton">
                                <div class="text-center m-5">
                                    <button type="button" class="btn-success"
                                        onclick="addFaq({{ $course->faqs->count() + 1 }})">
                                        Add more</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-success">


                        <div class="card-footer bg-transparent">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>

                </div>


        </div>
        </form>
    </div>
    </div>
@endsection

@section('createcource')
    <script>
        var formNo = 1;

        function addCarricullam(i) {
            // alert(i);
            ++formNo;
            newI = ++i;
            // alert(i);
            var newForm =
                ' <div id="cari' + i +
                '" class="col-md-6 mb-3"><label>Title</label><input type="text" class="form-control" name="addCarricullam[' +
                i +
                '][title]" required><div class="invalid-feedback">Please provide a url.</div><label>Description</label><input type="text" class="form-control" name="addCarricullam[' +
                i +
                '][description]" required> <div class="invalid-feedback">Please provide a url.</div><button type="button" class="btn-danger m-2" onclick="removeCari(' +
                i +
                ')">Remove</button></div><div class="col-lg-6" id="addbutton"><div class="text-center m-5"><button type="button" class="btn-success" onclick="addCarricullam(' +
                newI + ')">Add more</button></div></div>';
            document.getElementById("addbutton").remove();
            document.getElementById("carriculam").innerHTML += newForm;

        }

        function removeCari(formCari) {
            document.getElementById("cari" + formCari).remove();

        }

        //faq
        function addFaq(i) {
            // alert(i);
            ++formNo;
            newI = ++i;
            // alert(i);
            var newForm =
                ' <div id="faq' + i +
                '" class="col-md-6 mb-3"><label>Question</label><input type="text" class="form-control" name="addFaq[' +
                i +
                '][title]" required><div class="invalid-feedback">Please provide a url.</div><label>Description</label><input type="text" class="form-control" name="addFaq[' +
                i +
                '][description]" required> <div class="invalid-feedback">Please provide a url.</div><button type="button" class="btn-danger m-2" onclick="removeFaq(' +
                i +
                ')">Remove</button></div><div class="col-lg-6" id="addFbutton"><div class="text-center m-5"><button type="button" class="btn-success" onclick="addFaq(' +
                newI + ')">Add more</button></div></div>';
            document.getElementById("addFbutton").remove();
            document.getElementById("faq").innerHTML += newForm;

        }

        function removeFaq(formFaq) {
            document.getElementById("faq" + formFaq).remove();

        }
    </script>

@endsection
