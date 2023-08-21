@extends('layouts.app')
@section('title', 'Create Cources')

@section('content')
@include('admin.course.header.courseHeader')

<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <form id="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-8 ">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Course Name</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                   placeholder="Product Name" value="Apple Iphone 8" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category">Course Category</label>
                            <!--<input type="text" class="form-control"  placeholder="Mobile Phones" required>-->
                            <select id="category" class="custom-select form-control" required>
                                <option value="">Select Course Category</option>
                                <option value="1">Self Placed Salseforce learning</option>
                                <option value="2">Live Training</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid category.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <!--<input type="text" class="form-control"  placeholder="Mobile Phones" required>-->
                            <select id="category" class="custom-select form-control" required>
                                <option value="">Select Product Category</option>
                                <option value="1">Mobile Phone</option>
                                <option value="2">Laptop & Computers</option>
                                <option value="3">Accessories</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid category.
                            </div>
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom04">Price</label>
                            <input type="text" class="form-control" id="validationCustom04" placeholder="$ 250"
                                   required>
                            <div class="invalid-feedback">
                                Please provide a valid price.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sku">Status</label>
                            <input type="text" class="form-control" id="sku" placeholder="sku-1029-5998" required>
                            <div class="invalid-feedback">
                                Please provide a status.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productDetails">Product Details</label>
                        <textarea class="form-control p-t-40 editor" id="productDetails"
                                  placeholder="Write Something..." rows="17" required></textarea>
                        <div class="invalid-feedback">
                            Please provide a product details.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags">Product Tags</label><br>
                        <input type="text" class="tags-input"  id="tags" placeholder="Add New"
                               value="Amsterdam,Washington,Sydney,Beijing,Cairo" required>
                    </div>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            "use strict";
                            window.addEventListener("load", function () {
                                var form = document.getElementById("needs-validation");
                                form.addEventListener("submit", function (event) {
                                    if (form.checkValidity() == false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add("was-validated");
                                    var editorElement = document.getElementById("productDetails");
                                    if (editorElement.value == '') {
                                        editorElement.parentNode.classList.add("is-invalid");
                                        editorElement.parentNode.classList.remove("is-valid");
                                    } else {
                                        editorElement.parentNode.classList.remove("is-invalid");
                                        editorElement.parentNode.classList.add("is-valid");
                                    }

                                }, false);
                            }, false);
                        }());
                    </script>
                </div>
                <div class="col-md-3">
                    <div class="card mt-4">
                        <h6 class="card-header white">Publish Box</h6>
                        <div class="card-body text-success">

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                <label class="custom-control-label" for="customControlValidation1">Check this custom checkbox</label>
                                <div class="invalid-feedback">Example invalid feedback text</div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <button class="btn btn-primary" type="submit">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection