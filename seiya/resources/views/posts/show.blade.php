<x-hp-layout id="home">
    @section('description', $article->description)
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-4 sm:px-6 lg:px-10 mt-4">
                <div class="bg-white w-full rounded-2xl px-6 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <div class="flex justify-between items-center">
                            <a href="{{route('posts.edit', $article)}}">
                                <x-primary-button class="bg-teal-700">編集</x-primary-button>
                            </a>
                            <form method="post" action="{{route('posts.destroy', $article)}}" class="inline-block">
                                @csrf
                                @method('delete')
                                <x-primary-button class="bg-red-700" onClick="return confirm('本当に削除しますか？');">削除</x-primary-button>
                            </form>
                        </div>

                        <div class="mt-4">
                            <p class="text-gray-700 text-sm line-clamp-3">
                                {{$article->description}}
                            </p>
                        </div>
                        <h1 class="text-lg text-gray-700 font-semibold mt-2">
                            {{ $article->title }}
                        </h1>

                        <div class="mt-4">
                            <img src="{{ asset('storage/images/'.$article->image) }}" alt="{{ $article->title }}" class="w-full h-auto max-h-64 object-cover rounded-lg">
                        </div>

                        <hr class="w-full my-4">
                        
                        <p class="mt-4 text-gray-600 py-4 whitespace-pre-line">{!! $article->body !!}</p>
                        
                        <div class="text-sm font-semibold flex justify-end">
                            <p>{{$article->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-hp-layout>
