<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="p-6 rounded-lg">
        <div class="flex justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold mb-1">Hello, Admin</h1>
                <h1 class="text-gray-600">Here is the summary of SUPERJAY CELL products</h1>
            </div>
            <x-primary-link href="#" class="h-full">Download Report</x-primary-link>
        </div>

        <div class="flex flex-row gap-2 w-full">
            <div class="p-4 flex flex-row w-full justify-between items-center rounded-md bg-white border">
                <div class="flex flex-col">
                    <span class="text-gray-600 text-sm">Total Products</span>
                    <span class="font-bold text-4xl">{{ $summary->total }}</span>
                </div>
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                </svg>
            </div>
            <div class="p-4 flex flex-row w-full justify-between items-center rounded-md bg-white border">
                <div class="flex flex-col">
                    <span class="text-gray-600 text-sm">Published Products</span>
                    <span class="font-bold text-4xl">{{ $summary->published }}</span>
                </div>
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="p-4 flex flex-row w-full justify-between items-center rounded-md bg-white border">
                <div class="flex flex-col">
                    <span class="text-gray-600 text-sm">Unpublished Products</span>
                    <span class="font-bold text-4xl">{{ $summary->nopublished }}</span>
                </div>
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="flex flex-row mt-6 w-full gap-2">
            <div class="p-4 w-full max-h-max rounded-md flex flex-col bg-white border">
                <span class="font-semibold mb-1">Published Products</span>
                <span class="text-sm text-gray-600 mb-2">Summary of total products by status</span>
                {!! $pieChart->container() !!}
            </div>
            <div class="p-4 w-full max-h-max rounded-md flex flex-col bg-white border">
                <span class="font-semibold mb-1">Product Categories</span>
                <span class="text-sm text-gray-600 mb-2">Summary of total products by category</span>
                {!! $barChart->container() !!}
            </div>
        </div>

        <script src="{{ $pieChart->cdn() }}"></script>

        {{ $pieChart->script() }}
        {{ $barChart->script() }}
    </div>
</x-layout>
