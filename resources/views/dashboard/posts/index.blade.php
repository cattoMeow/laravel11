@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post</h1>
    </div>


    <h2>Section title</h2>
    <div class="table-responsive small col-lg-10">
        <div class="">

            <a href="/dashboard/posts/create" class="btn btn-primary ">Create new
                post</a>
        </div>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $posts)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $posts->title }}</td>
                    <td>{{$posts->category->name}}</td>
                    <td>
                        <a href="/dashboard/posts/{{$posts->slug}}" class="badge bg-info">
                            <svg class="bi">
                                <use xlink:href="#door-closed" />
                            </svg>
                        </a>
                        <a href="" class="badge bg-warning">
                            <svg class="bi">
                                <use xlink:href="#door-closed" />
                            </svg>
                        </a>
                        <a href="" class="badge bg-danger">
                            <svg class="bi">
                                <use xlink:href="#door-closed" />
                            </svg>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>
@endsection