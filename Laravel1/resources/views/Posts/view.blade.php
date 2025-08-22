@extends('Layout.layout')

@section('title', 'Create Post')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">View Post</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @if ($post->image_path != null)
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="mb-4 object-cover  w-100">    
            @endif
            <h2 class="text-xl font-semibold mb-2">Post ID: ({{ $post->id }})</h2>
            <h2 class="text-xl font-semibold mb-2">Post Title: {{ $post->title }}</h2>
            <p class="text-gray-700 mb-4"><strong>Posted By:</strong> {{ $post->user->name }}</p>
            <p class="text-gray-700 mb-4"><strong>Description:</strong> {{ $post->description }}</p>
            <p class="text-gray-500 text-sm">Created At: {{ $post->created_at}}</p>
    </div>
    <div class="mt-6">
        <h3 class="text-lg font-semibold mb-2">Comments</h3>
        @if($post->comments->isEmpty())
            <p class="text-gray-500">No comments yet.</p>
        @else
            <ul class="list-disc pl-5">
                @foreach($post->comments as $comment)
                    <li class="mb-2">
                        <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                        <span class="text-gray-500 text-sm">({{ $comment->created_at }})</span>
                        <div>
                            <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-1" style="background-color:#353451;" onclick="return confirm('Are you sure you want to delete this comment?')">
        Delete
    </button>
</form>
                            <a href="{{ route('comments.edit', ['id' => $comment->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded" style="background-color:#353451;">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="postedby">Posted By</label>
                <select id="user_id" name="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        
                    @endforeach
</select>
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Add a Comment</label>
                <textarea id="comment" name="comment" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Write your comment here..."></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit Comment</button>
@endsection
