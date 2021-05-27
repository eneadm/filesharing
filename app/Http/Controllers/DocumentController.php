<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentController extends Controller
{
    public function show(Document $document): BinaryFileResponse
    {
        $path = storage_path('app/'.$document->path);

        if (! file_exists($path)) {
            throw new \Exception('File does not exist.');
        }

        if ($document->user_id !== auth()->id()) {
            throw new \Exception('This file does not belong to you.');
        }

        // Add file assign "share" check here...
        // TODO: Maybe move this logic to a middleware latter.

        return response()->file($path);
    }

    public function download(Document $document): BinaryFileResponse
    {
        $path = storage_path('app/'.$document->path);

        if (! file_exists($path)) {
            throw new \Exception('File does not exist.');
        }

        if ($document->user_id !== auth()->id()) {
            throw new \Exception('This file does not belong to you.');
        }

        // Add file assign "share" check here...
        // TODO: Maybe move this logic to a middleware latter.

        return response()->download($path);
    }
}
