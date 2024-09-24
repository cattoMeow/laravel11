@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new post</h1>
    </div>
    <div class="col-lg-8 mb-8">

        <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    autofocus value="{{old('title')}}">
                @error('title')
                <p class=" invalid-feedback">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{old('slug')}}">
                @error('slug')
                <p class=" invalid-feedback">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div>
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select mb-3" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    @if(old('category_id') == $category->id)
                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                    @endforeach
                </select>
                @error('category')
                <p class=" text-pink-600 text-sm">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                @error('image')
                <p class=" text-pink-600 text-sm">
                    {{$message}}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Content</label>
                <input id="body" type="hidden" name="body" value="{{old('body')}}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                <p class=" text-pink-600 text-sm">
                    {{$message}}
                </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

</main>

<!-- <script>
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
});
</script> -->

<script>
const title = document.querySelector("#title");
const slug = document.querySelector("#slug");

title.addEventListener("keyup", function() {
    slug.value = title.value.toLowerCase().replaceAll(' ', '-');
});
document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
});
</script>
@endsection