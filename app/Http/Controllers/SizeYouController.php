<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SizeYouController extends Controller
{
    public function store(Request $request)
    {
        // Validazione
        $validated = $request->validate([
            'email' => 'required|email',
            'altezza' => 'required|numeric|min:50|max:250',
            'peso' => 'required|numeric|min:20|max:300',
            'sex' => 'required|in:male,female',
            'dob' => 'required|date',
        ]);

        // Dati da inviare
        $aka = md5($validated['email']); // esempio: hash dell'email come identificatore univoco
        $height = number_format($validated['altezza'], 1, '.', '');
        $weight = number_format($validated['peso'], 1, '.', '');
        $sex = $validated['sex'];
        $dob = $validated['dob'];

        // Token statico o recuperato da OAuth
        $authToken = config('services.sizeyou.token');

        //dd($aka, $height, $weight, $sex, $dob, $authToken);

        // Chiamata API
        $url = "https://pre-api.sizeyou.it/sizeyou/v0/subject/{$aka}/{$height}/{$weight}/{$sex}/{$dob}";

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$authToken}",
            'Accept' => 'application/json',
            'Url-Callback' => route('demo.index'), // callback di esempio
        ])->put($url, [
                    'opaquedata' => '{}', // JSON placeholder
                ]);

        if ($response->successful()) {
            $json = $response->json();

            if (isset($json['qrdeeplink']['qrcode_png'])) {
                $imageData = $json['qrdeeplink']['qrcode_png'];
                return back()
                    ->with('success', 'QR Code generato!')
                    ->with('qrCode', $imageData)
                    ->with('qrLink', $json['qrdeeplink']['link']);
            }
        }

        return back()->withErrors(['api_error' => 'Errore chiamata API: ' . $response->body()]);
    }
}
