<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisteredAdminController extends Controller
{
    public function create()
    {
        return view('auth.admin_register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            
        ]);
        $user = new User([
            'name' => $request->name,
            'surname' => $request->surname, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        $user->save();
        return redirect()->route('login')->with('success', 'L\'administrateur a été enregistré avec succès. Vous pouvez maintenant vous connecter.');
    }
}
