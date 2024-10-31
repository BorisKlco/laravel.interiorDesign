<?php

use App\Models\Image;
use App\Models\Style;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $userChoice = request('style');
    if ($userChoice) {
        $styles = Style::where('name', '=', $userChoice)->firstOrFail();
        $images = Image::with('style', 'tags')
            ->where('style_id', $styles->id)
            ->paginate(12)
            ->appends(['style' => request('style')]);
    } else {
        $images = Image::with('style', 'tags')
            ->paginate(12)
            ->appends(['style' => request('style')]);
    }
    return view('home', ['image' => $images]);
})->name('home');

Route::get('search', function () {
    return view('search');
});

Route::get('pickem', function () {
    return view('pickem');
});

Route::get('/test', function () {
    $test = Image::with('style', 'tags')->first();
    return view('test', ['img' => $test]);
});
