<?php

namespace App\Http\Controllers;

use App\Models\Rendezveny;
use Illuminate\Http\Request;

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
        $rendezvenyek = Rendezveny::orderBy('id', 'desc')->paginate(10);
        return view('home', compact('rendezvenyek'));
    }
}
