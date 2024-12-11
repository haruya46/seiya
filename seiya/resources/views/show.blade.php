<x-hp-layout id="home">
    @section('description', $article->description)
    <div class="max-w-7xl mx-auto custom-mobile-padding"> <!-- Reduced padding -->
        <div class="mx-1 sm:p-2">
            <div > <!-- Reduced margin-top -->
                <div class="bg-white w-full rounded-2xl px-6 py-2 shadow-lg hover:shadow-2xl transition duration-500"> <!-- Reduced padding inside the box -->
                    <div class="aspect-container rounded-lg">
                        <img src="{{ asset('storage/images/'.$article->image) }}" 
                             alt="{{ $article->title }}" 
                             class="aspect-image">
                    </div>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl text-gray-700 font-semibold"> <!-- Restored original font size -->
                        {{ $article->title }}
                    </h2>

                    <p class="mt-4 text-sm sm:text-base lg:text-lg text-gray-600 py-1 whitespace-pre-line"> <!-- Restored original font size for body text -->
                        {!! $article->body !!}
                    </p>

                    <div class="text-sm font-semibold flex justify-end">
                        <p>{{$article->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-hp-layout>

<style>
    @media (max-width: 640px) {
        .custom-mobile-padding {
            padding-left: 0.5mm; /* Reduced padding */
            padding-right: 0.5mm; /* Reduced padding */
        }
        .custom-mobile-padding h1 {
            font-size: 1.25rem; /* Restored original font size for mobile */
        }
        .custom-mobile-padding p {
            font-size: 1rem; /* Restored original font size for mobile */
        }
        .custom-mobile-padding img {
            max-height: 160px; /* Reduced image height for mobile */
            max-width: 640;
        }
    }
</style>
