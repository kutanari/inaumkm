<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
        Halo, Selamat datang!
    </h1>

    <p>
        Kami dengan bangga mempersembahkan Inaproduct X BNI RumahUMKM, sebuah inovasi kolaboratif yang bertujuan untuk mendukung UMKM dalam meningkatkan potensi dan kualitas bisnis mereka. Dengan dukungan dari BNI, kami hadir dengan solusi yang akan membantu UMKM naik kelas dalam industri mereka.
    </p>
    <p>
        Bergabunglah dengan kami dalam perjalanan ini, dan bersama-sama kita akan membawa UMKM menuju puncak kesuksesan.
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-0 lg:p-8">
    <div class="p-5 relative border border-gray-300 border-dashed rounded-lg text-center justify-center items-center content-center object-center">
        <div class="flex items-center w-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://laravel.com/docs">Profil Usaha</a>
            </h2>
        </div>

        <div class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed z-0">
            <div class="h-48 overflow-hidden w-full block">
                <div class="absolute left-1/4 md:left-16 sm:left-32 lg:left-32 xl:left-44">
                    <div class="absolute">
                        <div class="pie" style="--p:50;--c:rgb(235, 235, 235);"></div>
                    </div>
                    <div class="absolute">
                        <div class="pie animate" style="--p:{{ ($persenCompletness)/2 }};--c:orange;">
                            <div class="text-center" x-data="{ current: 0, target: {{ $persenCompletness }}, time: 1000}" x-init="() => {
                                setTimeout(function() {
                                    start = current; 
                                    const interval = Math.max(time / (target - start), 5); 
                                    const step = (target - start) /  (time / interval);  
                                    const handle = setInterval(() => {
                                        if(current < target) 
                                            current += step
                                        else {
                                            clearInterval(handle);
                                            current = target
                                        }
                                    }, interval)
                                }, 500)
                            }">
                                <div class="card"x-text="Math.round(current) + '%'"></div>
                            </div>
                            <span class="text-sm absolute left-0 bottom-1/3">0%</span>
                            <span class="text-sm absolute -right-2 bottom-1/3">100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p>
            Lengkapi informasi profil usaha anda untuk mendapatkan <span class="font-semibold">Company Profile</span> yang optimal dan myakinan.
        </p>
        <p class="mt-4 text-sm z-20">
            <a href="{{ route('user-company') }}" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Ubah profil usaha

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <div class="p-5 border border-gray-300 border-dashed rounded-lg text-center justify-center items-center content-center object-center">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <h2 class="ml-3 text-xl font-semibold text-gray-900 dark:text-white">
                <a href="https://tailwindcss.com/">Produk</a>
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Belum ada produk
        </p>
        <p class="mt-4 text-sm">
            <a href="{{ route('manage-product') }}" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
                Kelola produk

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ml-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>
</div>
