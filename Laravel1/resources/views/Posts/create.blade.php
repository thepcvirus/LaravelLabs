@extends('Layout.layout')

@section('title', 'Create Post')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Create New Post</h1>
        <form action="{{ route('posts.store') }}" method="Post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="Post Title" value="{{ old('title') }}" >
            </div>
            @error('title')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Description</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder="Post desription" value="{{ old('description') }}">
            </div>
            @error('description')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
                
            @enderror
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="postedby">Posted By</label>
                <select id="postedby" name="postedby" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        
                    @endforeach
</select>
            </div>
            @error('postedby')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror
            <div class="mb-4">
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('image')
                    <div class="text-red-500 text-xs italic">{{ $message }}</div>
                @enderror
                </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded" type="submit">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
