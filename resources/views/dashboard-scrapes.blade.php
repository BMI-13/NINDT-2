<x-app-layout>
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="{{ route('dashboard.cars') }}" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Cars</a>
                    </li>
                    {{-- <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Company</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Team</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline">Features</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 m-4">
                @if (Request::route()->getName()=='dashboard.cars')
                <livewire:cars-v1-table/>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
