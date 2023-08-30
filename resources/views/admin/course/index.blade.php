@extends('layouts.app')
@section('title', 'All Cources')

@section('content')

    @include('admin.course.header.courseHeader')
    @if (Session::has('msg'))
        <p class="alert alert-info">{{ Session::get('msg') }}</p>
    @endif
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b shadow">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <tbody>
                                        @if ($courses->count() > 0)
                                            @foreach ($courses as $item)
                                                <tr class="no-b">
                                                    <td class="w-10">
                                                        {{-- <img src="assets/img/demo/shop/s1.png" alt=""> --}}
                                                        @if (isset($item->cover_image) &&
                                                                !empty($item->cover_image && File::exists(public_path('storage/CourseImage/' . $item->cover_image))))
                                                            <img src="{{ asset('storage/CourseImage/' . $item->cover_image) }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('noimg.png') }}" alt="Image not found">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <h6>{{ $item->name }}</h6>
                                                        <small
                                                            class="text-muted">{{ $item->category->category_type == 0 ? 'Self Placed Salseforce learning' : 'Live Training' }}</small>
                                                    </td>
                                                    <td>{{ $item->price }}</td>
                                                    <td><span
                                                            class="badge {{ $item->status == 1 ? ' badge-success' : ' badge-danger' }}">{{ $item->status == 1 ? 'Published' : 'Unpublished' }}</span>
                                                    </td>
                                                    {{-- <td>
                                                <span><i class="icon icon-data_usage"></i> 5 days ago</span><br>
                                                <span><i class="icon icon-timer"></i> 5 September, 2017</span>
                                            </td> --}}
                                                    <td>
                                                        <div class="d-flex" style="gap: 2px">
                                                            <a class="btn-fab btn-fab-sm btn-primary  text-white"
                                                                href="{{ route('courses.edit', encrypt($item->slug)) }}"><i
                                                                    class="icon-pencil"></i></a>
                                                            <form method="POST"
                                                                action="{{ route('courses.destroy', $item->slug) }}"
                                                                class="action-icon">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="submit"
                                                                    class="btn-fab btn-fab-sm  btn-danger show_confirm"
                                                                    data-toggle="tooltip" title='Delete'>

                                                                    <i class="icon-trash"></i>
                                                                </button>
                                                            </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <h1>No courses</h1>
                                        @endif
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
