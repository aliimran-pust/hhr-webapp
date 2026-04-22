<?php

namespace  App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    public function createPdf($upload_path, $pdf_file)
    {
        if (! $pdf_file) {
            return;
        }

        // make unique name for pdf
        $currentDate = Carbon::now()->toDateString();
        $file_name = uniqid(). '.' . $pdf_file->extension();

        $pdf_file->move($upload_path, $file_name);

        return $file_name;
    }

    public function updatePdf($upload_path, $pdf_file, $old_file)
    {
        // make unique name for pdf
        $currentDate = Carbon::now()->toDateString();
        $file_name = uniqid(). '.' . $pdf_file->extension();

        if (file_exists(public_path($upload_path . '/'. $old_file))) {
            File::delete(public_path($upload_path . '/'. $old_file));
        }

        $pdf_file->move($upload_path, $file_name);

        return $file_name;
    }
}
