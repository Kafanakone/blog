@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl text-blue-900 uppercase">
            Les posts 
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a 
            href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Créer un nouveau post
        </a>
    </div>
@endif

    <div class="text-center">
        <a href="/blog" class="border px-4 py-2">All</a>
        <a href="htmlindex" class="border px-4 py-2">HTML</a>
        <a href="cssindex" class="border px-4 py-2">CSS</a>
        <a href="phpindex" class="border px-4 py-2 bg-gray-400">PHP</a>
        <a href="frameworkindex" class="border px-4 py-2">Frameworks/Bibliothèques</a>

    </div>
@foreach ($posts as $post)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="text-center">
            <img src="{{ asset('images/' . $post->image_path) }}" alt="" style="max-height:300px;" >
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-4xl pb-4 uppercase">
                {{ $post->title }}
            </h2>

            <span class="text-gray-500">
                Par <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Créer le  {{ date('d M Y à H:i:s', strtotime($post->updated_at)) }}
            </span>
            <p class="mt-2 italic text-gray-500">Catégorie: <span class="font-bold"> {{ $post->category }}</span></p>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light" style="max-height:200px; overflow:hidden; margin-bottom:1em">
                {{ $post->description }}
            </p>

            <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4  px-8 rounded-3xl">
                Voir plus
            </a>
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a 
                        href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Editer
                    </a>
                </span>

                <span class="float-right">
                     <form 
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3"
                            type="submit">
                            Supprimer
                        </button>

                    </form>
                </span>
            @endif
        </div>
    </div>    
@endforeach

@endsection