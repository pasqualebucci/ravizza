<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SnipcartController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

Route::get('/', [DemoController::class, 'index'])->name('demo.index');

Route::get('/docs', function () {
    return view('docs');
});

Route::get('/privacy-policy', function () {
    return view('privacy', ['link' => 'privacy']);
});
Route::get('/cookie-policy', function () {
    return view('cookie', ['link' => 'cookie']);
});



Route::post('/shirtly-request', [DemoController::class, 'store'])->name('shirtly.request');

Route::post('/upload-dropzone', function (Request $request) {
    $request->validate([
        'file' => 'required|image|max:10240',
    ]);

    $path = $request->file('file')->store('user_photos', 'public');
    $url = Storage::url($path); // Returns '/storage/uploads/filename.jpg'
    return response()->json(['path' => $url]);
})->name('upload.dropzone');


Route::get('fabric/{slug}', [DemoController::class, 'show'])->name('demo.show');

Route::post('/webhook', [SnipcartController::class, 'handleWebhook'])
    ->name('snipcart.webhook')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/lang/{locale}', function (string $locale) {
    if (! in_array($locale, ['it', 'en'])) {
        abort(400);
    }

    App::setLocale($locale);



    Session::put('locale', $locale);
    return redirect()->back(); // Torna alla pagina precedente

});
