<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = User::all()->count();
        $formularios = Formulario::all()->count();
        $roles = Role::all()->count();
        return view('home', ['usuarios' => $usuarios, 'formularios'=>$formularios, 'roles'=>$roles]);
    }
}
