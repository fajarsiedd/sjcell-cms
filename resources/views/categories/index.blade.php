<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold">Categories</h1>
        <div class="flex gap-4">
            <x-primary-link href="{{ route('categories.create') }}" class="h-full">Add Category</x-primary-link>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <form action="{{ route('categories.index') }}">
                    <x-text-input placeholder="Search" name="search" class="ps-10"></x-text-input>
                </form>
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto border sm:rounded-lg mt-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($categories) == 0)
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="px-6 py-4 text-center" colspan="4">
                            Categories is empty
                        </td>
                    </tr>
                @endif

                @foreach ($categories as $category)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4 flex flex-row items-center" x-data="{ color: '{{ $category->color }}' }">
                            <div :class="`flex w-8 h-8 rounded-full border mr-2 bg-${color}-400`"></div>
                            <span>
                                {{ $category->color }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-row gap-4 justify-end">
                                <a href="{{ route('categories.edit', $category->id) }}">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-600"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    onsubmit="return confirm('Category will be deleted permanently, are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><svg
                                            class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-600"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
