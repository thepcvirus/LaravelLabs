@extends('Layout.layout')

@section('title', 'Create Post')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
    @csrf
    @method('PUT')  <!-- This converts POST to PUT -->

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">ID</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="id" value="{{ $post->id }}" readonly>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id" name="id" type="text" hidden placeholder="id" value="{{ $post->id }}" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="Post Title" value="{{ $post->title}}">
            </div>
            @error('title')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Description</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder="Post desription" value="{{ $post->description }}">
            </div>
            @error('description')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="postedby">Posted By</label>
                <select id="postedby" name="postedby" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
  @foreach ($users as $user)
                        
                        <option {{ $user->id == $post->user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
</select>
            </div>
            <div class="mb-4">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="mb-4 w-32 h-32 object-cover">
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" value="{{ $post->image_path }}">
                @error('image')
                    <div class="text-red-500 text-xs italic">{{ $message }}</div>
                @enderror
                </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded" type="submit">
                    Update Post
                </button>
            </div>
        </form>
    </div>
@endsection
