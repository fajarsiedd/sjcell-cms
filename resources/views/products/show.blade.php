<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="p-6 bg-white border border-gray-200 rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold">Detail Product</h1>
            <a href="{{ route('products.index') }}">
                <svg class="w-8 h-8 text-gray-800 dark:text-white hover:text-gray-700" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>

        <div class="mb-5 w-full flex flex-row gap-10 mt-6">
            <div>
                <x-input-label>Thumbnail</x-input-label>
                <div class="bg-gray-200 rounded-md w-60 h-60 relative">
                    <img class="absolute border z-0 w-full h-full rounded-md object-cover"
                        src="{{ asset('storage/' . $product->thumbnail) }}" alt="Preview">
                </div>

                <x-input-label class="mt-5">Options</x-input-label>
                <div class="flex flex-row justify-between items-center">
                    <span class="text-sm text-gray-600">Publish product</span>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" class="sr-only peer"
                            {{ $product->status == 1 ? 'checked' : '' }} disabled>
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-300">
                        </div>
                    </label>
                </div>
            </div>

            <div class="w-full">
                <div class="mb-5">
                    <x-input-label for="name">Product Name</x-input-label>
                    <x-text-input type="text" id="name" name="name" value="{{ $product->name }}" disabled />
                </div>
                <div class="mb-5">
                    <x-input-label for="description">Product Description</x-input-label>
                    <textarea rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 transition ease-in-out duration-150"
                        name="description" id="description" cols="30" disabled>{{ $product->description }}</textarea>
                </div>
                <div class="mb-5">
                    <x-input-label for="category">Product Category</x-input-label>
                    <select id="category" name="category" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 transition ease-in-out duration-150">
                        <option value="Iphone" {{ $product->category == 'Iphone' ? 'selected' : '' }}>Iphone</option>
                        <option value="Android" {{ $product->category == 'Android' ? 'selected' : '' }}>Android</option>
                        <option value="PC" {{ $product->category == 'PC' ? 'selected' : '' }}>PC</option>
                        <option value="Tablet" {{ $product->category == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    </select>
                </div>
                <div class="mb-5">
                    <x-input-label for="price">Price</x-input-label>
                    <x-text-input type="number" id="price" name="price" value="{{ $product->price }}"
                        disabled />
                </div>
            </div>
        </div>
    </div>
</x-layout>
