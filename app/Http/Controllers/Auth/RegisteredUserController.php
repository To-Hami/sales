<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use function Symfony\Component\Mime\attach;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $tenant = Tenant::create([
            'name' => $request->name,
        ]);

        $tenant->domains()->create([
            'domain' => $request->subdomain . '.localhost'
        ]);

        $user->tenants()->attach($tenant->id);
        $user->attachRole('admin');


        Config::set('database.default', 'tenant');
        Config::set('database.connections.tenant.database', 'tenancy_' . $user->id);

        $tenant->run(function ($tenant) use ($request) {
            $tenantUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password'),
            ]);
        });
        event(new Registered($user));
        Auth::login($user);
        return redirect('http://' . $request->subdomain . '.localhost:8000' . '/home');


    }
}
