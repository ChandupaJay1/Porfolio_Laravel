<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\DashboardController;

// Public routes
Route::get('/', [ReviewController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::post('/reviews', [ReviewController::class, 'submitReview'])->name('reviews.submit');

// Authentication routes
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.admin-login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {



    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Contacts management
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Reviews management
    Route::get('/reviews', [ReviewController::class, 'adminIndex'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/reviews/{review}/toggle-approval', [ReviewController::class, 'toggleApproval'])->name('reviews.toggle-approval');
    Route::post('/reviews/{review}/toggle-featured', [ReviewController::class, 'toggleFeatured'])->name('reviews.toggle-featured');

    // Skills management
    Route::get('/skills', [\App\Http\Controllers\Admin\SkillController::class, 'index'])->name('skills.index');
    Route::get('/skills/create', [\App\Http\Controllers\Admin\SkillController::class, 'create'])->name('skills.create');
    Route::post('/skills', [\App\Http\Controllers\Admin\SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [\App\Http\Controllers\Admin\SkillController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill}', [\App\Http\Controllers\Admin\SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [\App\Http\Controllers\Admin\SkillController::class, 'destroy'])->name('skills.destroy');
    Route::post('/skills/{skill}/toggle-active', [\App\Http\Controllers\Admin\SkillController::class, 'toggleActive'])->name('skills.toggle-active');

    // Projects management
    Route::get('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [\App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [\App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::post('/projects/{project}/toggle-active', [\App\Http\Controllers\Admin\ProjectController::class, 'toggleActive'])->name('projects.toggle-active');
    Route::post('/projects/{project}/toggle-featured', [\App\Http\Controllers\Admin\ProjectController::class, 'toggleFeatured'])->name('projects.toggle-featured');

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.simple-login'); // Changed to simple-login
    })->name('login');
});
