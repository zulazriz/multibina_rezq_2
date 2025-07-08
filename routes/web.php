<?php

use Illuminate\Support\Facades\Route;
use App\Data\DummyData;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// // == START: LALUAN UNTUK LANDING PAGE ==
// Route::get('/', function () {
//     // Ambil data dari class DummyData, bukan lagi hardcoded di sini.
//     $projects = DummyData::getProjects();
//     $slides = DummyData::getSlides();

//     // Arahkan ke view di dalam folder 'landingpage'
//     return view('landingpage.home', compact('projects', 'slides'));
// });
// // == END: LALUAN UNTUK LANDING PAGE ==


// // == START: LALUAN UNTUK ADMIN PANEL ==
// // Semua laluan admin akan mempunyai prefix '/admin'
// Route::prefix('admin')->group(function () {

//     // Contoh laluan untuk dashboard admin
//     // Boleh diakses melalui URL: yourwebsite.com/admin/dashboard
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

//     // Anda boleh tambah laluan admin yang lain di sini
//     // Contoh: Route::get('/projects', ...);

// });
// // == END: LALUAN UNTUK ADMIN PANEL ==

// == START: LALUAN UNTUK LANDING PAGE ==
// Laluan utama untuk landing page.
// Ini adalah laluan yang akan dilihat oleh pengguna apabila mereka melawat URL akar (/).
// Ia tidak memerlukan sebarang pengesahan (authentication) dan boleh diakses oleh sesiapa sahaja.
Route::get('/mrr', function () {
    // Mengambil data projek dan slaid dari class DummyData.
    // Pastikan class DummyData wujud dan mengandungi method getProjects() dan getSlides().
    $projects = DummyData::getProjects();
    $slides = DummyData::getSlides();
    $galleries = DummyData::getGallery();

    // Mengarahkan ke view 'home' yang terletak di dalam folder 'resources/views/landingpage'.
    // Data $projects dan $slides akan dihantar ke view ini untuk dipaparkan.
    return view('landingpage.home', compact('projects', 'slides', 'galleries'));
})->name('landingpage'); // Memberikan nama 'landing' kepada laluan ini untuk rujukan yang mudah.
// == END: LALUAN UNTUK LANDING PAGE ==


// == START: LALUAN UNTUK PENGGUNA BERDAFTAR (JETSTREAM) ==
// Kumpulan laluan ini memerlukan pengguna untuk log masuk (authenticated)
// dan e-mel mereka telah disahkan (verified) oleh Jetstream.
Route::middleware([
    'auth:sanctum', // Middleware untuk memastikan pengguna telah log masuk menggunakan Sanctum.
    config('jetstream.auth_session'), // Middleware untuk menguruskan sesi autentikasi Jetstream.
    'verified', // Middleware untuk memastikan e-mel pengguna telah disahkan.
])->group(function () {

    // Laluan untuk dashboard pengguna biasa.
    // Pengguna yang telah log masuk dan disahkan akan diarahkan ke sini.
    // Boleh diakses melalui URL: yourwebsite.com/dashboard
    Route::get('/dashboard', function () {
        return view('dashboard'); // Mengarahkan ke view 'dashboard' (biasanya dashboard lalai Jetstream).
    })->name('dashboard'); // Memberikan nama 'dashboard' kepada laluan ini.


    // == START: LALUAN UNTUK ADMIN PANEL ==
    // Kumpulan laluan ini adalah untuk fungsi-fungsi pentadbiran (admin).
    // Semua laluan di dalam kumpulan ini akan mempunyai prefix '/admin'.
    // Ini bermakna URL akan menjadi yourwebsite.com/admin/....
    // Laluan ini juga akan menggunakan middleware autentikasi Jetstream yang sama di atas.
    Route::prefix('admin')->group(function () {

        // Laluan untuk dashboard admin.
        // Boleh diakses melalui URL: yourwebsite.com/admin/dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard'); // Mengarahkan ke view 'dashboard' yang khusus untuk admin.
        })->name('admin.dashboard'); // Memberikan nama 'admin.dashboard' kepada laluan ini.

        // Anda boleh menambah laluan admin yang lain di sini.
        // Contoh: Laluan untuk menguruskan projek dalam panel admin.
        // Route::get('/projects', function () {
        //     return view('admin.projects');
        // })->name('admin.projects');

        // Contoh: Laluan untuk menguruskan pengguna dalam panel admin.
        // Route::get('/users', function () {
        //     return view('admin.users');
        // })->name('admin.users');

    });
    // == END: LALUAN UNTUK ADMIN PANEL ==

});
// == END: LALUAN UNTUK PENGGUNA BERDAFTAR (JETSTREAM) ==
