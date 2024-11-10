<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="p-6 bg-white border border-gray-200 rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold">Add Category</h1>
            <a href="{{ route('categories.index') }}">
                <svg class="w-8 h-8 text-gray-800 dark:text-white hover:text-gray-700" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-5 w-full flex flex-row gap-10 mt-6">
                <div class="flex-1">
                    <x-input-label for="name">Category Name <span class="text-red-600">*</span></x-input-label>
                    <x-text-input type="text" id="name" name="name" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="name">Color <span class="text-red-600">*</span></x-input-label>
                    <div class="flex flex-row" x-data="{ selectedColor: 'green' }">
                        <div :class="`flex w-12 rounded-md border mr-2 bg-${selectedColor}-400`"></div>

                        <select id="color" name="color" x-on:change="selectedColor = $event.target.value"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500 transition ease-in-out duration-150">
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                            <option value="purple">Purple</option>
                            <option value="red">Red</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <div class="flex flex-row gap-4">
                    <x-secondary-link href="{{ route('categories.index') }}">
                        Cancel
                        </x-secondary-button>
                        <x-primary-button>
                            Create
                        </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
