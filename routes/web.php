<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HasilUjianController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\QuizSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserImportController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// ==========================
// 👤 ROUTE USER (LOGIN USER)
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');
    Route::get('/historiPengerjaan', [HasilUjianController::class, 'index'])->name('histori-pengerjaan');

    // Quiz routes (user sisi frontend)
    Route::get('/quiz/{id}/start', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/hasil/{id}', [QuizController::class, 'hasil'])->name('quiz.hasil');
    Route::post('/quiz/{id}/session', [QuizSessionController::class, 'handleSession'])->name('quiz.session');
    Route::post('/quiz/{id}/complete', [QuizSessionController::class, 'completeSession'])->name('quiz.complete');
    Route::post('/quiz/cek-kode', [FrontendController::class, 'checkKode'])->name('quiz.checkKode');
    Route::get('/quiz/{id}/detail', [FrontendController::class, 'detail'])->name('quiz.detail');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ==========================
// 🛡️ ROUTE ADMIN
// ==========================
Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index'])->name('admin.quiz-terbaru');

    // ✅ Ini route yang benar untuk user.index (global, bukan dalam quiz/essay)
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    Route::post('/siswa/import', [SiswaController::class, 'import'])
    ->name('siswa.import');

    Route::get('/users/import', [UserImportController::class, 'index'])->name('UserImport.import');
Route::post('/users/import', [UserImportController::class, 'import'])->name('users.import.post');

    

    // CRUD resource
    Route::resource('quiz', QuizController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('users', UserController::class);
    Route::resource('matapelajaran', MataPelajaranController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);




    

    // Toggle aktivasi quiz
    Route::patch('/quiz/{id}/toggle-aktivasi', [QuizController::class, 'toggleAktivasi'])->name('quiz.toggleAktivasi');

    // ===== FITUR BARU: ADMIN HASIL QUIZ =====
    Route::get('/hasil-keseluruhan', [QuizController::class, 'hasilKeseluruhan'])->name('quiz.hasil.keseluruhan');
    Route::get('/hasil/{hasilId}/detail-admin', [QuizController::class, 'detailHasilAdmin'])->name('quiz.hasil.detail');
    Route::delete('/hasil/{hasilId}/hapus', [QuizController::class, 'hapusHasil'])->name('quiz.hasil.hapus');
    // ===== END FITUR BARU =====   

    // Essay Grading Routes
    Route::prefix('quiz/essay')->name('quiz.essay.')->group(function () {
        Route::get('/grading', [QuizController::class, 'essayGrading'])->name('grading');
        Route::get('/grade/{detailId}', [QuizController::class, 'gradeEssay'])->name('grade');
        Route::post('/grade/{detailId}', [QuizController::class, 'storeEssayGrade'])->name('store-grade');
        Route::post('/bulk-grade', [QuizController::class, 'bulkGradeEssay'])->name('bulk-grade');
        Route::get('/stats', [QuizController::class, 'essayGradingStats'])->name('stats');

        // Mass grading tambahan
        Route::get('/mass-grade/{soal}', [QuizController::class, 'massGradeEssay'])->name('mass-grade');
    });
});
