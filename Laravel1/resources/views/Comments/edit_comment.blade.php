@extends('Layout.layout')

@section('title', 'Create Post')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Edit Comment</h1>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    @method('PUT')  <!-- This converts POST to PUT -->

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">ID</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id" name="id" type="text" placeholder="id" value="{{ $comment->id }}" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Post Id</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="post_id" name="post_id" type="text" placeholder="Post Title" value="{{ $comment->post_id}}" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">comment</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="comment" name="comment" type="text" placeholder="Post desription" value="{{ $comment->comment }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="postedby">Commented By</label>
                <select id="user_id" name="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
  @foreach ($users as $user)
                        <option {{ $user->id == $comment->user_id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                        
                    @endforeach
</select>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded" type="submit">
                    Update Comment
                </button>
            </div>
        </form>
    </div>
@endsection
