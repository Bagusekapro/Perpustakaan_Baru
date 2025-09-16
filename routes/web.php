    <?php

    use App\Http\Controllers\AnggotaController;
    use App\Http\Controllers\BukuController;
    use App\Http\Controllers\PeminjamanController;
    use App\Models\Anggota;
    use App\Models\Peminjaman;
    use App\Models\Buku;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });


    Route::resource('Buku', BukuController::class);
    Route::resource('Peminjaman', PeminjamanController::class);
    Route::resource('Anggota', AnggotaController::class)->parameters([
    'Anggota' => 'Anggota']);

    // Route::get('/dashboard/buku', [BukuController::class, 'index'])->name('Bukus.index');
    // Route::get('/dashboard/Anggota', [AnggotaController::class, 'index'])->name('Anggotas.index');
