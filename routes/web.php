<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\MechanicalController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Localization Route
Route::get('/changeLocale/{locale}', function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('products.changeLocale');

Route::get('/landingpage', [HomeController::class, 'landing'])->name('landing');
// Protected Routes
Route::middleware('auth')->group(function() {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('homepage');

    // Profiles
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index')->middleware('role:admin');
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profile_create');
    Route::post('/profiles/store', [ProfileController::class, 'store'])->name('profile_store');
    Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit')->middleware('role:admin');
    Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update')->middleware('role:admin');
    Route::delete('/profiles/destroy/{profile}', [ProfileController::class, 'destroy'])->name('profiles.destroy')->middleware('role:admin');
    Route::put('/profile/update', [ProfileController::class, 'update2'])->name('profile.update');
    Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->where('id', '\d+')->name('profiles.show')->middleware('role:admin');

    // Mechanicals
    Route::get('/mechanicals', [MechanicalController::class, 'index'])->name('mechanicals.index');
    Route::get('/mechanicals/create', [MechanicalController::class, 'create'])->name('mechanical_create');
    Route::post('/mechanicals/store', [MechanicalController::class, 'store'])->name('mechanical_store');
    Route::get('/mechanicals/{mechanical}/edit', [MechanicalController::class, 'edit'])->name('mechanicals.edit');
    Route::put('/mechanicals/{mechanical}', [MechanicalController::class, 'update'])->name('mechanicals.update');
    Route::delete('/mechanicals/{mechanical}', [MechanicalController::class, 'destroy'])->name('mechanicals.destroy');
    Route::get('/mechanicals/{mechanical}', [MechanicalController::class, 'show'])->where('id', '\d+')->name('mechanicals.show');

    // Clients
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('client_create')->middleware('role:admin');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('client_store');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('/clients/{client}', [ClientController::class, 'show'])->where('id', '\d+')->name('clients.show');

    // Cars
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/carsclient', [CarController::class, 'indexclient'])->name('cars.indexclient')->middleware('role:client');
    Route::get('/cars/create', [CarController::class, 'create'])->name('car_create')->middleware(['auth', 'role:admin,client']);
    Route::post('/cars/store', [CarController::class, 'store'])->name('car_store')->middleware(['auth', 'role:admin,client']);
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit')->middleware(['auth', 'role:admin,client']);
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update')->middleware(['auth', 'role:admin,client']);
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy')->middleware(['auth', 'role:admin,client']);

    // Repairs
    Route::get('/repairs', [RepairController::class, 'index'])->name('repairs.index')->middleware(['auth', 'role:admin,client']);;
    Route::get('/repairs/create/{car}', [RepairController::class, 'create'])->name('repairs.create')->middleware(['auth', 'role:admin,client']);;
    Route::post('/repairs/store', [RepairController::class, 'store'])->name('repairs.store')->middleware(['auth', 'role:admin,client']);
    Route::get('/repairs/list', [RepairController::class, 'list'])->name('repairs.list')->middleware('role:admin');
    Route::get('/repairs/list2', [RepairController::class, 'list2'])->name('repairs.list2')->middleware('role:mechanical');
    Route::get('/repairs/listclient', [RepairController::class, 'listclient'])->name('repairs.listclient')->middleware('role:client');
    Route::get('/repairs/historyadmn', [RepairController::class, 'historyadmn'])->name('repairs.historyadmn')->middleware('role:admin');
    Route::get('/repairs/history', [RepairController::class, 'history'])->name('repairs.history')->middleware('role:mechanical');
    Route::get('/repairs/historyclient', [RepairController::class, 'historyclient'])->name('repairs.historyclient')->middleware('role:client');
    Route::get('/repairs/{id}', [RepairController::class, 'show2'])->name('repairs.show2');
    Route::get('/repairs/{id}/invoice', [RepairController::class, 'generateInvoicePdf'])->name('repairs.invoice');
    Route::get('/repairs/{id}/torepair', [RepairController::class, 'torepair'])->name('repairs.torepair')->middleware('role:admin');
    Route::get('/repairs/{repair}/email', [RepairController::class, 'email'])->name('repairs.email')->middleware('role:admin');
    Route::post('/repairs/update/{id}', [RepairController::class, 'update'])->name('repairs.update');
    Route::post('/repairs/updateAdmin/{id}', [RepairController::class, 'updateAdmin'])->name('repairs.updateAdmin')->middleware('role:admin');
    Route::post('/repairs/updateMechanical/{id}', [RepairController::class, 'updateMechanical'])->name('repairs.updateMechanical');

    // Spare Parts
    Route::get('/spareparts', [SparePartController::class, 'index'])->name('spareParts.index')->middleware(['auth', 'role:admin,mechanical']);
    Route::get('/spareparts/create', [SparePartController::class, 'create'])->name('spareParts.create')->middleware(['auth', 'role:admin,mechanical']);
    Route::post('/spareparts/store', [SparePartController::class, 'store'])->name('spareParts.store')->middleware(['auth', 'role:admin,mechanical']);
    Route::get('/spareparts/list', [SparePartController::class, 'list'])->name('spareParts.list')->middleware(['auth', 'role:admin,mechanical']);
    Route::get('/spareparts/{sparePart}/edit', [SparePartController::class, 'edit'])->name('spareParts.edit')->middleware(['auth', 'role:admin,mechanical']);
    Route::post('/spareparts/{sparePart}', [SparePartController::class, 'update'])->name('spareParts.update')->middleware(['auth', 'role:admin,mechanical']);
    Route::delete('/spareparts/{sparePart}', [SparePartController::class, 'destroy'])->name('spareParts.destroy')->middleware(['auth', 'role:admin,mechanical']);
    Route::get('/spareParts/search', [SparePartController::class, 'search'])->name('spareParts.search')->middleware(['auth', 'role:admin,mechanical']);
    Route::get('/spareParts/export', [SparePartController::class, 'export'])->name('spareParts.export')->middleware(['auth', 'role:admin,mechanical']);
    Route::post('/spareParts/import', [SparePartController::class, 'import'])->name('spareParts.import')->middleware(['auth', 'role:admin,mechanical']);

    // Charges
    Route::get('/charges/create/{repair}', [ChargeController::class, 'create'])->name('charges.create')->middleware(['auth', 'role:admin,mechanical']);
    Route::post('/charges/store/{repair}', [ChargeController::class, 'store'])->name('charges.store')->middleware(['auth', 'role:admin,mechanical']);
    Route::get('/charges/select/{repair}', [ChargeController::class, 'selectSparePart'])->name('charges.selectSparePart')->middleware(['auth', 'role:admin,mechanical']);
    Route::post('/charges/store-spare-part/{repair}', [ChargeController::class, 'storeSparePart'])->name('charges.storeSparePart')->middleware(['auth', 'role:admin,mechanical']);

    // Settings
    Route::get('/settings', [InformationsController::class, 'index'])->name('settings.index');
});

// Route for downloading invoice
Route::get('/invoice/{id}/download', [RepairController::class, 'download'])->name('invoice.download')->middleware(['auth', 'role:admin,client']);
