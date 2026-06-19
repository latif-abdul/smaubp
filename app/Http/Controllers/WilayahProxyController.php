<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WilayahProxyController extends Controller
{
    public function proxy(Request $request)
    {
        // Handle preflight
        if ($request->isMethod('options')) {
            return response('')
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET,OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type,Accept,Origin,Authorization');
        }

        $endpoint = $request->query('endpoint', '');
        if (! $endpoint) {
            return response()->json(['error' => 'endpoint required'], 400);
        }

        // Build and restrict target host to wilayah.id to avoid SSRF
        $endpoint = (strpos($endpoint, '/') === 0) ? $endpoint : '/' . $endpoint;
        $url = 'https://wilayah.id/api' . $endpoint .'.json';

        $resp = Http::withHeaders(['Accept' => 'application/json'])->timeout(10)->get($url);

        return response($resp->body(), $resp->status())
            ->header('Content-Type', $resp->header('Content-Type', 'application/json'))
            ->header('Access-Control-Allow-Origin', '*');
    }
}