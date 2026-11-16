<?php

declare(strict_types=1);

use App\Http\Api\Controllers\TemporaryUploads\StoreTemporaryUploadController;
use Illuminate\Support\Facades\Route;

Route::post('/', StoreTemporaryUploadController::class)
    ->name('store');
