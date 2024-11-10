<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="p-6 bg-white border border-gray-200 rounded-lg">                
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
    
        <form action="{{ route('products.update', $product) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5 w-full flex flex-row gap-10 mt-6">
                <div>
                    <x-input-label>Thumbnail</x-input-label>
                    <div class="bg-gray-200 rounded-md w-60 h-60 relative" x-data="{ imagePreview: '' }">
                        <img x-show="imagePreview" class="absolute border z-0 w-full h-full rounded-md object-cover"
                            :src="imagePreview" alt="Preview">
    
                        <img x-show="! imagePreview" class="absolute border z-0 w-full h-full rounded-md object-cover"
                            src="{{ asset('storage/' . $product->thumbnail) }}" alt="Preview">
    
                        <div class="flex items-center justify-center w-full h-full z-10 absolute">
                            <label for="thumbnail"
                                class="flex flex-col items-center justify-center w-full h-full rounded-lg cursor-pointer">
                                <input id="thumbnail" name="thumbnail" @change="selectImage" type="file" accept="image/*"
                                    class="hidden" />
                            </label>
                        </div>
                    </div>
    
                    <x-input-label class="mt-5">Options</x-input-label>
                    <div class="flex flex-row justify-between items-center">
                        <span class="text-sm text-gray-600">Publish product</span>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="status" class="sr-only peer" {{ $product->status == 1 ? 'checked' : '' }}>                        
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-300">
                            </div>
                        </label>
                    </div>
                </div>
    
                <div class="w-full">
                    <div class="mb-5">
                        <x-input-label for="name">Product Name</x-input-label>
                        <x-text-input type="text" id="name" name="name" value="{{ $product->name }}" required />
                    </div>
                    <div class="mb-5">
                        <x-input-label for="description">Product Description</x-input-label>
                        <textarea rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 transition ease-in-out duration-150"
                            name="description" id="description" cols="30">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-5">
                        <x-input-label for="category">Product Category</x-input-label>
                        <select id="category" name="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 transition ease-in-out duration-150">
                            @foreach ($categories as $category)                            
                                <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <x-input-label for="price">Price</x-input-label>
                        <x-text-input type="number" id="price" name="price" value="{{ $product->price }}"
                            required />
                    </div>
                </div>
            </div>
    
            <div class="flex justify-end mt-6">
                <div class="flex flex-row gap-4">
                    <x-secondary-link href="{{ route('products.index') }}">
                        Cancel
                        </x-secondary-button>
                        <x-primary-button>
                            Save
                        </x-primary-button>
                </div>
            </div>
        </form>
    </div>    
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
