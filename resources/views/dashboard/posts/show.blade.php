@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- <main class="pt-1 pb-16 lg:pt-1 lg:pb-24 bg-white dark:bg-gray-900 antialiased "> -->
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article
            class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center my-1 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{$post->author}}">
                        <div>
                            <a href="/posts?author={{$post->author->username}}" rel="author"
                                class="text-xl font-bold text-gray-900 dark:text-white">{{$post->author->name}}</a>

                            <p class="text-base text-gray-500 dark:text-gray-400 mb-1">
                                {{$post->created_at->diffForHumans()}}</p>
                            <a href="/dashboard/posts"
                                class="hover:underline no-underline bg-primary-100 text-primary-800 text-xs font-bold inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">

                                &laquo; Back to my post

                            </a>

                            <a href="/dashboard/posts/{{$post->slug}}/edit"
                                class="hover:underline no-underline bg-yellow-100 text-yellow-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-800">
                                &#128393; Edit
                            </a>

                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button href="#" onclick="return confirm('Are you sure?')"
                                    class="hover:underline no-underline bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-800">
                                    &times; Delete
                                </button>
                            </form>




                        </div>
                    </div>
                </address>
                <h1
                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{$post->title}}</h1>
            </header>

            @if ($post->image)
            <div>
                <img src="{{asset('storage/'.$post->image)}}" class="" alt="">
            </div>
            @else
            <img src="{{asset('storage/'.$post->image)}}" class="object-fit-md-contain border rounded" alt="">
            @endif

            <p>{!! $post->body !!}</p>
        </article>
    </div>
</main>
@endsection