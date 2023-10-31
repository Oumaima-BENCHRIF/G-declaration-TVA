<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        // Get the authenticated user.
        $user = Auth::user();
    
        // Get the database name from the user's attributes (assuming it's stored there).
        $databaseName = $user->nomBD;
    
        // Update the .env file with the new database name.
        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);
        $updatedEnvContent = preg_replace(
            '/PORTAL_DB_DATABASE=.*$/m',
            'PORTAL_DB_DATABASE=' . $databaseName,
            $envContent
        );
        file_put_contents($envPath, $updatedEnvContent);
    
        // Reconnect to the database with the new configuration.
        config(['database.connections.mysql.database' => $databaseName]);
        DB::reconnect('mysql');
    
        // Regenerate the session.
        $request->session()->regenerate();
    
        // Redirect the user to the intended page (e.g., the home page).
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}