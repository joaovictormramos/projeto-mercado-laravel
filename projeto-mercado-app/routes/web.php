<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreProductController;
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

Route::get('/', function () {
    return view('home');
});

//Stores routes
Route::get('/estabelecimentos', [StoreController::class, 'getStores']);

Route::get('/cadastrar-estabelecimento', [StoreController::class, 'formRegisterStore']);

Route::post('/cadastrar-estabelecimento', [StoreController::class, 'registerStore']);

Route::get('/editar-estabelecimento/{id}', [StoreController::class, 'formUpdateStore']);

Route::get('/excluir-estabelecimento/{id}', [StoreController::class, 'deleteStore']);

//StoresProducts routes
Route::get('/gerenciar-estoque/{id}', [StoreProductController::class, 'manageStoreProducts']);

Route::get('/editar-produto-estabelecimento/{id}', [StoreProductController::class, 'listSetStoreProducts']);

Route::get('/adicionar-produto/{id}', [StoreProductController::class, 'listAddStoreProduct']);

Route::post('/adicionar-produto', [StoreProductController::class, 'addStoreProduct']);

Route::get('/editar-produto-estabelecimento/{storeId}/{productId}', [StoreProductController::class, 'fomrSetSetoreProduct']);

Route::post('/editar-produto-estabelecimento', [StoreProductController::class, 'setSetoreProduct']);

Route::get('/remover-produto-estoque/{storeId}/{storeProductId}', [StoreProductController::class, 'deleteProductStore']);

//Sections routes
Route::get('/secoes', [SectionController::class, 'getSections']);

Route::get('/cadastrar-secao', [SectionController::class, 'formRegisterSection']);

Route::post('/cadastrar-secao', [SectionController::class, 'registerSection']);

Route::get('/editar-secao/{id}', [SectionController::class, 'formUpdateSection']);

Route::get('/excluir-secao/{id}', [SectionController::class, 'deleteSection']);

//Brands routes
Route::get('/marcas', [BrandController::class, 'getBrands']);

Route::get('/cadastrar-marca', [BrandController::class, 'formRegisterBrand']);

Route::post('/cadastrar-marca', [BrandController::class, 'registerBrand']);

Route::get('/editar-marca/{id}', [BrandController::class, 'formUpdateBrand']);

Route::get('/excluir-marca/{id}', [BrandController::class, 'deleteBrand']);

//Products routes
Route::get('/produtos', [ProductController::class, 'getProducts']);

Route::get('/cadastrar-produto', [ProductController::class, 'formRegisterProduct']);

Route::post('/cadastrar-produto', [ProductController::class, 'registerProduct']);

Route::get('/editar-produto/{id}', [ProductController::class, 'formUpdateProduct']);

Route::get('/excluir-produto/{id}', [ProductController::class, 'deleteProduct']);

//Package routes
Route::get('/embalagens', [PackageController::class, 'getPackages']);

Route::get('/cadastrar-embalagem', [PackageController::class, 'formRegisterPackage']);

Route::post('/cadastrar-embalagem', [PackageController::class, 'registerPackage']);

Route::get('/editar-embalagem/{id}', [PackageController::class, 'formUpdatePackage']);

Route::get('/excluir-embalagem/{id}', [PackageController::class, 'deletePackage']);

//Admin routes
Route::get('/admin', [AdminController::class, 'index']);
