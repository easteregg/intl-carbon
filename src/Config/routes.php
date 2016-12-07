<?php

// Insert Routes here.
return [
    Route::get("/package-provider", \Easteregg\Package\Http\Controllers\PackageProviderController::class . '@index'),
];
