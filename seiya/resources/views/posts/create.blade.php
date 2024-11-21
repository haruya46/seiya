<x-hp-layout>

    <div class="container mx-auto ">
        <div class="flex justify-center">
            <div class="w-full max-w-3xl">
                <div class="bg-white shadow-md rounded-lg">
                    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="block text-sm font-medium text-gray-700">件名</label>
                            <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="body" class="block text-sm font-medium text-gray-700">投稿本文</label>
                            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="body" id="summernote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="image" class="font-semibold leading-none mt-4">サムネイル</label>
                            <input id="image" type="file" name="image" class="mt-2">
                        </div>
                        <div class="form-group">
                            <label for="description" class="block text-sm font-medium text-gray-700">メタディスクリプション</label>
                            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="description" id="description"  cols="30" rows="10"></textarea>
                        </div>
                        <div class="flex justify-center items-center ">
                            <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 mb-3 w-1/3 rounded hover:bg-red-700 transition duration-300">
                                保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-hp-layout>