@props(['post' => $post])

<div class="mb-4 bg-gray-100 rounded border-gray-200 border-2">
    <div class="ml-2">
        <a href="{{ route('user.posts', $post->user ) }}" class="font-bold">{{ $post->user->name }}</a>
        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

        <p class="mb-2">{{ $post->body }}</p>

        <div class="flex flex-row">
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Delete</button>
                </form>
            @endcan
            <div class="flex items-center">
                @auth
                    @if (!$post->likedBy(auth()->user()))
                        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="text-blue-500">Like</button>
                        </form>
                    @else
                        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-500">Unlike</button>
                        </form>
                    @endif
                @endauth
                <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
            </div>
        </div>
    </div>
</div>