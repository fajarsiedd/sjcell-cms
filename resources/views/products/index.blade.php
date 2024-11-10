<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="p-6 bg-white border border-gray-200 rounded-lg">
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold">Products</h1>
            <div class="flex gap-4">
                <x-primary-link href="{{ route('products.create') }}" class="h-full">Add Product</x-primary-link>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <form action="{{ route('products.index') }}">
                        <x-text-input placeholder="Search" name="search" class="ps-10"></x-text-input>
                    </form>
                </div>
            </div>
        </div>

        @if ($search)
            <div class="mt-6">
                <span class="font-semibold">Result for product id '{{ $search }}'</span>
            </div>
        @endif

        <div class="relative overflow-x-auto border sm:rounded-lg mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Thumbnail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) == 0)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4 text-center" colspan="4">
                                Product is empty
                            </td>
                        </tr>
                    @endif

                    @foreach ($products as $product)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $product->thumbnail) }}"
                                    class="w-14 h-14 object-cover rounded-md" alt="{{ $product->thumbnail }}">
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->name }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-{{ $product->category->color }}-100 text-{{ $product->category->color }}-400 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-{{ $product->category->color }}-900 dark:text-{{ $product->category->color }}-300">
                                    {{ $product->category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                ${{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->status == 1)
                                    <div class="flex flex-row items-center gap-1">
                                        <div class="h-2 w-2 rounded-full bg-green-400"></div>
                                        <span class="text-sm">Published</span>
                                    </div>
                                @else
                                    <div class="flex flex-row items-center gap-1">
                                        <div class="h-2 w-2 rounded-full bg-yellow-400"></div>
                                        <span class="text-sm">Unpublished</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row gap-4 justify-end">
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-600"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-600"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Product will be deleted permanently, are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><svg
                                                class="w-6 h-6 text-gray-800 dark:text-white hover:text-gray-600"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
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
    </div>
</x-layout>
