<x-front-layout>
    <x-front.navbar />
    <div class="relative overflow-hidden">
        <div class="hidden lg:block w-full h-full absolute">
            <div
                class="bg-image-mockups absolute z-20 w-full h-full bg-no-repeat bg-auto bg-right-top -right-72 xl:-right-28">
            </div>
        </div>
        <x-front.hero />
    </div>
    <section class="text-gray-600 body-font" x-data="{shown: false}" x-intersect.half="shown = true">
        <div class="container px-5 py-12 mx-auto flex flex-wrap">
            <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden animate-fade-up animate-once animate-ease-in-out animate-delay-none">
                <img alt="feature" class="object-center h-full w-full" src="/images/kad.svg">
            </div>
            <div class="flex flex-col flex-wrap lg:py-6 lg:w-1/2 lg:pl-12 lg:text-left text-center bg-slate-100">
                <h2 class="font-bold mb-5 text-3xl">Program Akselerasi UMKM</h2>
                <div x-show="shown" class="flex flex-col mb-10 lg:items-start items-center animate-fade-up animate-once animate-ease-in-out animate-delay-100">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Company Profile</h2>
                        <p class="leading-relaxed text-base">Anda dapat meningkatkan kredibilitas bisnis dan meraih
                            kepercayaan pelanggan melalui company profile. Daftarkan bisnis Anda di Inaproduct agar
                            lebih mudah ditemukan calon pelanggan potensial.</p>
                    </div>
                </div>
                <div x-show="shown" class="flex flex-col mb-10 lg:items-start items-center animate-fade-up animate-once animate-ease-in-out animate-delay-300">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <circle cx="6" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Enabler Program</h2>
                        <p class="leading-relaxed text-base">Anda dapat mengakses jaringan distribusi yang lebih luas
                            baik ke retail, horeka, hingga ekspor. Bisnis Anda pun dapat menjangkau konsumen dalam dan
                            luar negeri.</p>
                    </div>
                </div>
                <div x-show="shown" class="flex flex-col mb-10 lg:items-start items-center animate-fade-up animate-once animate-ease-in-out animate-delay-500">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Growth Program</h2>
                        <p class="leading-relaxed text-base">Anda dapat mengembangkan bisnis agar lebih menonjol
                            dibanding kompetitor sekaligus meningkatkan penjualan. Caranya dengan meningkatkan
                            kapabilitas bisnis UMKM melalui sertifikasi dan pelatihan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-front.footer />
</x-front-layout>
