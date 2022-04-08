@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-40 mb-6">
            <div>
                <h1 class="text-2xl font-medium mb-1"></h1>
            </div>
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                @auth
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" 
                        class="bg-gray-100 selected:border-yellow-600 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post Something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                <p>You need to text something</p>
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded font-medium hover:bg-yellow-700 ">
                            Post
                        </button>
                    </div>
                @endauth
            </form>

            @if($posts->count())
                @foreach ($posts as $post)

                    <x-post :post="$post"/>

                @endforeach

                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>
@endsection