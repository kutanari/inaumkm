<div x-data="{ shown: false }">

    <div class="fixed z-50 top-0 w-full bg-white shadow-md">
        <nav class="container flex justify-between items-center z-20">
            <div class="my-4">
                <a href="/">
                    <x-application-mark class="" />
                </a>
            </div>

            <div class="hidden lg:block text-sm text-neutral-grayish-blue">
                <x-front.navlink :href="route('home')" :active="request()->routeIs('home')">Home</x-front.navlink>
                <x-front.navlink :href="route('tentang-kami')" :active="request()->routeIs('tentang-kami')">Tentang Kami</x-front.navlink>
                <x-front.navlink :href="route('kontak-kami')" :active="request()->routeIs('kontak-kami')">Kontak</x-front.navlink>
            </div>
            <div class="hidden lg:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-7 py-3 rounded-full text-primary-ina-red-darker text">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-7 rounded-full text-primary-ina-red-darker font-bold">Masuk</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-primary-ina-red px-7 py-3 rounded-full text-neutral-white text-xs bg-gradient-to-r from-primary-ina-red to-primary-ina-red-darker hover:from-primary-ina-red-darker hover:to-primary-ina-red-darker hover:button-brightness">Daftar</a>
                    @endif
                @endauth
            </div>

            <button class="lg:hidden focus:outline-none">
                <img x-show="!shown" x-transition src="/icons/icon-hamburger.svg" alt=""
                    @click="shown = true" />
                <img x-show="shown" x-transition src="/icons/icon-close.svg" alt="" @click="shown = false" />
            </button>
        </nav>
    </div>

    <div class="fixed inset-0 z-30 bg-gray-800 bg-opacity-7 0 lg:hidden" x-transition x-show="shown">
        <div class="bg-white text-primary-dark-blue flex flex-col text-center my-20 py-4 rounded">
            <x-front.navlink-mobile :defaultClass="''" activeClass="''" :href="route('home')" :active="request()->routeIs('home')">Home</x-front.navlink-mobile>
            <x-front.navlink-mobile :defaultClass="''" activeClass="''" :href="route('tentang-kami')" :active="request()->routeIs('tentang-kami')">Tentang Kami</x-front.navlink-mobile>
            <x-front.navlink-mobile :defaultClass="''" activeClass="''" :href="route('kontak-kami')" :active="request()->routeIs('kontak-kami')">Kontak</x-front.navlink-mobile>

            @auth
                {{-- <x-front.navlink-mobile :defaultClass="''" activeClass="''" :href="route('dashboard')" :active="request()->routeIs('dashboard')">Beranda</x-front.navlink-mobile> --}}
                {{-- <a href="{{ url('/dashboard') }}" class="px-7 py-3 rounded-full text-primary-ina-red-darker text">Dashboard</a> --}}
            @else
                <x-front.navlink-mobile :defaultClass="'text-primary-ina-red font-bold'" activeClass="''" :href="route('login')" :active="request()->routeIs('login')">Masuk</x-front.navlink-mobile>
                {{-- <a href="{{ route('login') }}" class="px-7 py-3 rounded-full text-primary-ina-red-darker text">Masuk</a> --}}

                @if (Route::has('register'))
                    <x-front.navlink-mobile :defaultClass="'mx-10 my-2 rounded-md bg-gradient-to-r from-primary-ina-red to-primary-ina-red-darker text-white'" activeClass="''" :href="route('register')" :active="request()->routeIs('register')">Daftar</x-front.navlink-mobile>
                    {{-- <a href="{{ route('register') }}" class="bg-primary-ina-red px-7 py-3 mx-2 text-neutral-white text-xs bg-gradient-to-r from-primary-ina-red to-primary-ina-red-darker hover:from-primary-ina-red-darker hover:to-primary-ina-red-darker hover:button-brightness">Daftar</a> --}}
                @endif
            @endauth
        </div>
    </div>
</div>
