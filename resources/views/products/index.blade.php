<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold">Products</h1>
        <div class="flex gap-4">
            <x-primary-button>Add Product</x-primary-button>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <x-text-input placeholder="Search" class="ps-10"></x-text-input>
            </div>
        </div>
    </div>
</x-layout>