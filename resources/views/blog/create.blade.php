@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center uppercase">
    <div class="py-15">
        <h1 class="text-4xl text-gray-700">
            Commencer un Post
        </h1>
    </div>
</div>
 
@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl p-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
        action="/blog"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="title"
            placeholder="Titre du Post..."
            class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-10 bg-transparent block border-b-2 w-full h-40 text-xl outline-none">
        </textarea>

        <div class="mt-4">
            <span class="text-gray-700">Catégorie</span>
            <div class="mt-4">
              <label class="inline-flex items-center">
                <input type="radio" class="form-radio" name="category" value="HTML">
                <span class="ml-2">HTML</span>
              </label>
              <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio" name="category" value="CSS">
                <span class="ml-2">CSS</span>
              </label>
              <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio" name="category" value="PHP">
                <span class="ml-2">PHP</span>
              </label>
              <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio" name="category" value="frameworks/Bibliothèques">
                <span class="ml-2">Frameworks/Bibliothèques</span>
              </label>
            </div>
          </div>

        <div class="bg-grey-lighter pt-15">
            <label class="w-55 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Selectionner un fichier
                </span>
                <input 
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Poster 
        </button>
    </form>
</div>

@endsection