<x-hp-layout id="home">
    @section('description', $article->description)
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> <!-- 横幅をmax-w-7xlに変更 -->
        <div class="mx-4 sm:p-8">
            <div class="px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-white w-full rounded-2xl px-6 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-xl sm:text-2xl lg:text-3xl text-gray-700 font-semibold">
                            {{ $article->title }}
                        </h1>

                        <div class="mt-4">
                            <img src="{{ asset('storage/images/'.$article->image) }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-auto max-h-64 sm:max-h-80 lg:max-h-96 object-cover rounded-lg">
                        </div>

                        <hr class="w-full my-4">

                        <p class="mt-4 text-sm sm:text-base lg:text-lg text-gray-600 py-4 whitespace-pre-line">
                            {!! $article->body !!}
                        </p>

                        <div class="text-sm font-semibold flex justify-end">
                            <p>{{$article->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-hp-layout>
