<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CandidateController;


//Route::get('/', [HomeController::class, 'index']);
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');
    echo("Cleared: cache:clear, view:clear, config:clear, route:clear");
});

Route::middleware(['web', 'auth', 'revalidate'])->group(function () {
    Route::get('candidate_list', [CandidateController::class, 'candidate_list'])->name('candidate_list');
    Route::get('candidate_export_excel', [CandidateController::class, 'exportExcel'])->name('candidate.export.excel');
    Route::get('candidate_export_pdf', [CandidateController::class, 'exportPdf'])->name('candidate.export.pdf');
    Route::get('generate_id_card/{id}', [CandidateController::class, 'generateIdCard'])->name('candidate.id_card');
    Route::get('view_details_member/{id}', [CandidateController::class, 'view_details_member'])->name('view_details_member');
    Route::get('edit_member/{id}', [CandidateController::class, 'edit_member'])->name('edit_member');
    Route::post('update_member/{id}', [CandidateController::class, 'update_member'])->name('update_member');
    Route::post('members_approval', [CandidateController::class, 'membersApproval'])->name('members.approve');
});



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])
    ->middleware(['throttle:5,1']); // 5 attempts per minute


// routes/web.php
Route::get('/test-email', function() {
    try {
        Mail::send('backend.email.test', [], function($message) {
            $message->to('imran.ali@du.ac.bd')
                ->subject('Email Configuration Test')
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        return "Test email sent successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
