<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('create_post') }}" method="POST">
                        @csrf
                        <h3>Write Post</h3>
                        <input type="text" name="title" id="title" placeholder="title"><br><br>
                        <input type="text" name="description" id="description" placeholder="description"><br><br>
                        <textarea name="content" id="content" placeholder="content"></textarea>

                        <button type="submit" value="post">Submit</button>
                    </form>

                    <h2>POSTS</h2>
                    @foreach ($posts as $post)
                        <hr>
                        <div>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ $post->description }}</p>
                            <p>{{ $post->content }}</p>
                        </div>     
                        <form action="{{ route('get_post', $post->id) }}" method="GET">
                            <button type="show" value="post">Submit</button>
                        </form>     
                        <form action="{{ route('delete_post', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="show" value="post">delete</button>
                        </form>           
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
