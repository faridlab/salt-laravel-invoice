<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltInvoice\Controllers\CategoriesController;
use SaltInvoice\Controllers\InvoicesController;
use SaltInvoice\Controllers\ItemsController;
use SaltInvoice\Controllers\SectionsController;
use SaltInvoice\Controllers\SectionItemsController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: CATEGORIES
    Route::get("invoices/categories", [CategoriesController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("invoices/categories", [CategoriesController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("invoices/categories/trash", [CategoriesController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("invoices/categories/import", [CategoriesController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("invoices/categories/export", [CategoriesController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("invoices/categories/report", [CategoriesController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("invoices/categories/{id}/trashed", [CategoriesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("invoices/categories/{id}/restore", [CategoriesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("invoices/categories/{id}/delete", [CategoriesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("invoices/categories/{id}", [CategoriesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("invoices/categories/{id}", [CategoriesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("invoices/categories/{id}", [CategoriesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("invoices/categories/{id}", [CategoriesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID


    // API: INVOICES ITEMS
    // TODO: this should use nesting route
    Route::get("invoices/items", [ItemsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("invoices/items", [ItemsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("invoices/items/trash", [ItemsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("invoices/items/import", [ItemsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("invoices/items/export", [ItemsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("invoices/items/report", [ItemsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("invoices/items/{id}/trashed", [ItemsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("invoices/items/{id}/restore", [ItemsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("invoices/items/{id}/delete", [ItemsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("invoices/items/{id}", [ItemsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("invoices/items/{id}", [ItemsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("invoices/items/{id}", [ItemsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("invoices/items/{id}", [ItemsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

});
