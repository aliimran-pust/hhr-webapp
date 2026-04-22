<?php

namespace AI\Auth\Http\Controllers;

use AI\Auth\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class DashboardController extends BaseController
{
    public function index()
    {
        $users = DB::table('users')
            ->leftJoin('user_logs', function ($join) {
                $join->on('users.id', '=', 'user_logs.user_id');
            })
            ->select('users.id', 'users.name', 'users.email', 'user_logs.last_login_at', 'user_logs.last_login_ip')
            ->get();

        return view('ai-auth::dashboard', compact('users'));
    }

    /**
     * Individual password change
     *
     * @return void
     */
    public function changePasswordForm()
    {
        $user = User::findOrfail(Auth::id());
        return view('ai-auth::user.change_password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        DB::table('users')
        ->where("users.id", '=', Auth::id())
        ->update(['password' => Hash::make($data['password'])]);

        return redirect()->route('auth.logout');
    }
}
