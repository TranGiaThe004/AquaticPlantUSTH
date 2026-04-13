<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IotTelemetryController;

Route::get('/ping', function () {
    return response()->json([
        'success' => true,
        'message' => 'API routes file OK',
    ]);
});

// Phase 2 - IoT telemetry (stateless, no CSRF)
Route::post('/iot/tanks/{tank}/telemetry', [IotTelemetryController::class, 'store'])
    ->whereNumber('tank')
    ->name('api.iot.telemetry.store');