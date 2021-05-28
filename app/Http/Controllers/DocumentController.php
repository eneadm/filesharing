<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentController extends Controller
{
    public function show(Document $document): BinaryFileResponse
    {
        return response()->file(storage_path('app/'.$document->path));
    }

    public function download(Document $document): BinaryFileResponse
    {
        return response()->download(storage_path('app/'.$document->path));
    }
}
