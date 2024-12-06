<x-hp-layout>

    {{-- 投稿一覧表示用のコード --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach ($article as $articles)
                <div class="flex flex-col sm:flex-row bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 my-6">
                    <img src="{{ asset('storage/images/'.$articles->image) }}" alt="Article Image" class="w-full sm:w-1/3 h-64 object-cover rounded-t-lg sm:rounded-l-lg sm:rounded-t-none">
                    <div class="p-6 flex flex-col justify-between w-full sm:w-2/3">
                        <div>
                            @php
                            $color = ''; // デフォルトの色を設定
                            if ($articles->access_controls) {
                                if ($articles->access_controls->status == 1) {
                                    $color = 'color:blue';
                                } elseif ($articles->access_controls->status == 0 || $articles->access_controls->status === null) {
                                    $color = 'color:default'; // 'default' は適切なスタイルに置き換える
                                }
                            }
                        @endphp

                            <button class="flex StatusButton "style="{{ $color }}" title="{{route('PostStatus',[$articles->id])}}">
                                公開
                            </button>
                            <h2 class="text-xl font-semibold text-gray-800 hover:underline cursor-pointer">{{$articles->title}}</h2>
                            <p class="text-gray-600 text-sm mt-2">Last updated: {{$articles->updated_at->format('M d, Y')}}</p>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700 text-sm line-clamp-3">
                                {{$articles->description}}
                            </p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('posts.show', $articles) }}" class="text-blue-500 hover:text-blue-700 text-sm font-medium">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    
</x-hp-layout>