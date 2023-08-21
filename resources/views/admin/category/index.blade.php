@extends('layouts.app')
@section('title', 'All Categories')

@section('content')

    @include('admin.category.header.categoryHeader')
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card no-b shadow">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="no-b">

                                                <td>
                                                    <h6>{{ $category->catagory_name }}</h6>

                                                </td>
                                                <td></td>
                                                <td><span class="badge badge-success"></span></td>
                                                <td>

                                                </td>
                                                <td>
                                                    <div class="d-flex" style="gap: 2px">
                                                        <a class="btn-fab btn-fab-sm btn-primary  text-white"
                                                        href="{{ route('categories.edit', encrypt($category->catagory_slug)) }}"><i
                                                            class="icon-pencil"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('categories.destroy', $category->catagory_slug) }}"
                                                        class="action-icon">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit"
                                                            class="btn-fab btn-fab-sm  btn-danger show_confirm"
                                                            data-toggle="tooltip" title='Delete'>

                                                            <i class="icon-trash"></i>
                                                        </button>
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <nav class="pt-3" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> --}}
        </div>
    </div>

@endsection
