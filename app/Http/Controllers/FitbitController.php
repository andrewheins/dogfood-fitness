<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\OauthToken;
use Inertia\Inertia;

class FitbitController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => config('services.fitbit.client_id'),
            'redirect_uri' => config('services.fitbit.redirect'),
            'response_type' => 'code',
            'scope' => 'activity heartrate location nutrition profile settings sleep social weight',
        ]);

        return redirect('https://www.fitbit.com/oauth2/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        $response = Http::asForm()->post('https://api.fitbit.com/oauth2/token', [
            'client_id' => config('services.fitbit.client_id'),
            'client_secret' => config('services.fitbit.client_secret'),
            'code' => $request->code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('services.fitbit.redirect'),
        ]);

        $tokenData = $response->json();

        OauthToken::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'provider' => 'fitbit',
            ],
            [
                'access_token' => $tokenData['access_token'],
                'refresh_token' => $tokenData['refresh_token'],
                'expires_at' => now()->addSeconds($tokenData['expires_in']),
            ]
        );

        return redirect()->route('dashboard');
    }

    public function disconnect()
    {
        OauthToken::where('user_id', auth()->id())
            ->where('provider', 'fitbit')
            ->delete();

        return redirect()->route('dashboard');
    }
}