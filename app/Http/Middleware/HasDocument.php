<?php

namespace App\Http\Middleware;

use App\Models\Document;
use Closure;
use Illuminate\Http\Request;

class HasDocument
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var Document $document */
        $document = $request->route()->parameter('document');

        if ($document instanceof Document) {
            $path = storage_path('app/'.$document->path);

            if (! file_exists($path)) {
                throw new \Exception('File does not exist.');
            }

            if ($document->user_id !== auth()->id()) {
                throw new \Exception('This file does not belong to you.');
            }

            //TODO: Add file sharing check here...
        }

        return $next($request);
    }
}
