<x-hp-layout>
    <!-- Contact Section -->
    <div class="content" id="contact">
        <div class="text-center mb-16"> <!-- Increased bottom margin -->
            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-800">Contact</h2>
            <p class="text-gray-600 mt-2 text-base sm:text-lg">すこしでも興味を持ってくれた人はこちらから</p>
        </div>
        <div class="contact-form max-w-4xl mx-auto mb-16"> <!-- Added bottom margin -->
            <form method="post" action="{{route('contact')}}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-8">
                    <div>
                        <label for="title" class="font-semibold leading-none text-lg sm:text-xl">件名</label>
                        <input type="text" name="title" class="w-full py-3 placeholder-gray-300 border border-gray-300 rounded-md text-lg sm:text-xl" id="title" value="{{old('title')}}" placeholder="Enter Title">
                    </div>
                    <div>
                        <label for="name" class="font-semibold leading-none text-lg sm:text-xl">名前</label>
                        <input type="text" name="name" class="w-full py-3 placeholder-gray-300 border border-gray-300 rounded-md text-lg sm:text-xl" id="name" value="{{old('name')}}" placeholder="Enter Name">
                    </div>
                    <div>
                        <label for="email" class="font-semibold leading-none text-lg sm:text-xl">メールアドレス</label>
                        <input type="text" name="email" class="w-full py-3 placeholder-gray-300 border border-gray-300 rounded-md text-lg sm:text-xl" id="email" value="{{old('email')}}" placeholder="Enter Email">
                    </div>
                    <div>
                        <label for="body" class="font-semibold leading-none text-lg sm:text-xl">本文</label>
                        <textarea name="body" class="w-full py-3 border border-gray-300 rounded-md text-lg sm:text-xl" id="body" cols="30" rows="6">{{old('body')}}</textarea>
                    </div>
                    <div class="mt-6 text-center">
                        <x-primary-button class="w-full sm:w-auto py-2 text-base sm:py-4 sm:text-xl">
                            送信する
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div
</x-hp-layout>