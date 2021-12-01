@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-5xl text-gray-800 uppercase">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-10">

    <div class="text-center mb-4">
        <img src="{{ asset('images/' . $post->image_path) }}" alt="" style="max-height:300px; " >
    </div>

    <span class="text-gray-500">
        Par <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Créer le  {{ date('d M Y à H:i:s', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
</div>

@endsection 