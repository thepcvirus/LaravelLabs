@extends('Layout.layout')

@section('title', 'Create Post')

@section('content')
    <div class="container mx-auto mt-8">
{{ $posts->links() }}
@if(isset($page))
    <h1 class="text-2xl font-bold mb-4">Posts - Page {{ $page }}</h1>
@endif

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" style="background-color:#16a34a;">
    <a href="{{ route('posts.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create Post</a>
</button>

<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Title</th>
            <th class="py-2 px-4 border-b">Slug</th>
            <th class="py-2 px-4 border-b">Description</th>
            <th class="py-2 px-4 border-b">Posted By</th>
            <th class="py-2 px-4 border-b">Created At</th>
            <th class="py-2 px-4 border-b">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td class="py-2 px-4 border-b">{{ $post->id }}</td>
                <td class="py-2 px-4 border-b">{{ $post->title}}</td>
                <td class="py-2 px-4 border-b">{{ $post->slug}}</td>
                <td class="py-2 px-4 border-b">{{ $post->description }}</td>
                <td class="py-2 px-4 border-b">{{ $post->user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $post->created_at_formatted}}</td>
                <td class="py-2 px-4 border-b">
                    <button class="bg-green-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-1" style="background-color:#2563eb;"><a href="{{ route('posts.show', ['id' => $post->id]) }}">View</a></button>
                    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mr-1" style="background-color:#f59e42;"><a href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit</a></button>
                    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-1" style="background-color:#353451;" onclick="return confirm('Are you sure you want to delete this post?')">
        Delete
    </button>
</form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
@endsection
