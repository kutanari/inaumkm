<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>
    
    <div class=" dark:bg-gray-900 ">
        <div class="relative overflow-hidden">
            <img src="/images/bg-jakarta-landmark.jpg" alt="city view" class="w-full absolute -top-1/2 sm:block hidden" />
            <img src="/images/mobile.png" alt="city view" class="w-full h-full absolute object-center object-fill sm:hidden" />
            <div class="text-xl relative bg-gradient-to-r from-orange-400 to-transparent w-full h-full top-0 md:p-16 p-6 flex flex-col justify-between">
                <div>
                    <h1 class="md:text-5xl text-3xl font-bold md:leading-10 leading-9 text-white sm:w-auto w-64">Inaproduct X BNI RumahUMKM</h1>
                    <p class="text-lg leading-6 text-white xl:w-5/12 lg:w-8/12 md:w-10/12  2xl:pr-12 mt-4">Kolaborasi untuk UMKM naik kelas.</p>
                </div>
                <div class="md:mt-12 mt-20 hidden">
                    <button class="text-base font-medium leading-4 text-indigo-700 bg-white sm:w-auto w-full rounded p-4 focus:outline-none hover:bg-gray-100 focus:ring-2 focus:ring-offset-2 focus:ring-white">Explore More</button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-user-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
