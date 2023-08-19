<x-front-layout>
    <x-front.navbar />
    <div class="relative overflow-hidden">
        <div class="hidden lg:block w-full h-full absolute">
            <div
                class="bg-image-mockups absolute z-20 w-full h-full bg-no-repeat bg-auto bg-right-top -right-72 xl:-right-28">
            </div>
        </div>
        <section id="hero" class="relative">
            <div class="bg-header-mobile bg-custom-mobile-header-size absolute w-full h-full bg-no-repeat lg:hidden"></div>
            <div class="bg-header-desktop absolute w-full h-full bg-no-repeat hidden lg:block bg-left -right-42.6%"></div>
            <div class="bg-image-mockups absolute z-20 w-full h-full bg-no-repeat bg-top -top-12 md:-top-16 bg-custom-mobile-mockup-size lg:hidden"></div>
            <div class="container h-screen relative bg-gradient-to-t from-white lg:from-transparent to-transparent z-20">
                <div class="h-full flex flex-col justify-end pb-4 lg:pb-0 lg:w-96 lg:justify-center">
                    <div class="flex flex-col justify-center items-center lg:items-start lg:text-left">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-front.footer />
</x-front-layout>