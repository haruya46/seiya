<x-hp-layout id="home">
    @section('description', 'ここはブログ一覧です！phpもしくはlaravelに関するスキルや実績を発信しています')
{{-- 投稿一覧表示用のコード --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="space-y-6">
        @foreach ($article as $articles)
            <div class="flex flex-col sm:flex-row bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('storage/images/'.$articles->image) }}" alt="Article Image" class="w-full sm:w-1/3 h-64 object-cover rounded-t-lg sm:rounded-l-lg sm:rounded-t-none">
                <div class="p-6 flex flex-col justify-between w-full sm:w-2/3">
                    <div>
                        <a href="{{ route('show', $articles) }}" class="text-blue-500 hover:text-blue-700 text-base sm:text-lg font-semibold">
                            <h3 class="text-2xl text-gray-800 hover:underline cursor-pointer">{{$articles->title}}</h3>
                        </a>
                        <p class="text-gray-600 text-sm mt-2">Last updated: {{$articles->updated_at->format('M d, Y')}}</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-700 text-sm line-clamp-3">
                            {{$articles->description}}
                        </p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('show', $articles) }}" class="text-blue-500 hover:text-blue-700 text-sm font-medium">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-hp-layout>