<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold">Add Product</h1>
        <a href="{{ route('products.index') }}">
            <svg class="w-8 h-8 text-gray-800 dark:text-white hover:text-gray-700" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </div>

    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-5 w-full flex flex-row gap-10 mt-6">
            <div>
                <x-input-label>Thumbnail <span class="text-red-600">*</span></x-input-label>
                <div class="bg-gray-200 rounded-md w-60 h-60 relative" x-data="{ imagePreview: '' }">
                    <img x-show="imagePreview" class="absolute z-0 w-full h-full rounded-md object-cover"
                        :src="imagePreview" alt="Preview">

                    <div class="flex items-center justify-center w-full h-full z-10 absolute">
                        <label for="thumbnail"
                            :class="imagePreview
                                ?
                                'flex flex-col items-center justify-center w-full h-full rounded-lg cursor-pointer' :
                                'flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600'">
                            <div x-show="! imagePreview" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)
                                </p>
                            </div>
                            <input id="thumbnail" name="thumbnail" @change="selectImage" type="file" accept="image/*"
                                class="hidden" />
                        </label>
                    </div>
                </div>

                <x-input-label class="mt-5">Options</x-input-label>
                <div class="flex flex-row justify-between items-center">
                    <span class="text-sm text-gray-600">Publish product immediately</span>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-300">
                        </div>
                    </label>
                </div>
            </div>

            <div class="w-full">
                <div class="mb-5">
                    <x-input-label for="name">Product Name <span class="text-red-600">*</span></x-input-label>
                    <x-text-input type="text" id="name" name="name" required />
                </div>
                <div class="mb-5">
                    <x-input-label for="description">Product Description</x-input-label>
                    <textarea rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 transition ease-in-out duration-150"
                        name="description" id="description" cols="30"></textarea>
                </div>
                <div class="mb-5">
                    <x-input-label for="category">Product Category <span class="text-red-600">*</span></x-input-label>
                    <select id="category" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 transition ease-in-out duration-150">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <x-input-label for="price">Price <span class="text-red-600">*</span></x-input-label>
                    <x-text-input type="number" id="price" name="price" required />
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <div class="flex flex-row gap-4">
                <x-secondary-link href="{{ route('products.index') }}">
                    Cancel
                    </x-secondary-button>
                    <x-primary-button>
                        Create
                    </x-primary-button>
            </div>
        </div>
    </form>
</x-layout>

<script>
    function selectImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onloadend = () => {
            this.imagePreview = reader.result; // Update the variable
        };

        console.log("File selected:", file); // Check if event is triggered

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
