<?php

namespace App\Http\Controllers;

use App\Services\ViewService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request, ViewService $viewService)
    {
        $viewService->setView([
            'ip' => $request->ip(),
            'user_agent' => $request->headers->get('User-Agent'),
            'url' => $request->headers->get('referer'),
        ]);

        return response()->file(public_path('banner.png'));
    }
}
