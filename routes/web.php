<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\WordController;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
]);

Route::get('/formularios', [FormularioController::class, 'index'])->name('formularios.index');
Route::get('/formularios/create', [FormularioController::class, 'create'])->name('formularios.create');
Route::post('/formularios', [FormularioController::class, 'store'])->name('formularios.store');
Route::get('/formularios/{formulario}/edit', [FormularioController::class, 'edit'])->name('formularios.edit');
Route::put('/formularios/{id}', [FormularioController::class, 'update'])->name('formularios.update');
Route::get('/formularios/{formulario}',[FormularioController::class, 'show'])->name('formularios.show');
Route::get('/formulario/{id}/generate-word', [WordController::class, 'generateWord'])->name('formulario.generateWord');
Route::get('/usuarios/{id}/formularios', [UserController::class, 'formularios'])->name('usuarios.formularios');
Route::get('/usuarios/{id}/formularios/detalle', [UserController::class, 'detalleFormularios'])->name('usuarios.formularios.detalle');
