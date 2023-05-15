<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAffiliate;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\AffiliateRegistrationReceived;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

    public function index()
    {
        $tanar = User::where('id', Auth::id())->first();
        return view('profile', compact('tanar'));
    }

    public function store(UpdateUserRequest $request)
    {
        $tanar = Auth::user();

        $tanar->name = $request->name;
        $tanar->pozicio = $request->pozicio;
        $tanar->leiras = $request->leiras;
        $tanar->avatar = $request->avatar;

        $tanar->save();

//        Mail::to('csongiika@gmail.com')
//            ->queue(new ContactMessageReceived($user));

        return response(['success' => true]);
    }
}
