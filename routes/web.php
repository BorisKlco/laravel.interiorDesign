<?php

use App\Models\Image;
use App\Models\Style;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $userChoice = request('style');
    if ($userChoice) {
        $styles = Style::where('name', '=', $userChoice)->firstOrFail();
        $images = Image::with('style', 'tags')
            ->where('style_id', $styles->id)
            ->inRandomOrder()
            ->paginate(12)
            ->appends(['style' => request('style')]);
    } else {
        $images = Image::with('style', 'tags')
            ->inRandomOrder()
            ->paginate(12)
            ->appends(['style' => request('style')]);
    }
    return view('home', ['image' => $images]);
})->name('home');

Route::get('/detail/{id}', function (Image $id) {
    $detail = $id->load('likes');
    return view('item', ['item' => $detail]);
});

Route::get('/download/{id}', function (Image $id) {
    $file = $id->style->name . '/' . $id->name;
    $name = fake()->word . '.webp';
    return Storage::download($file, $name);
});

Route::get('search', function () {
    return view('search');
});

Route::get('pickem', function () {
    return view('pickem');
});
