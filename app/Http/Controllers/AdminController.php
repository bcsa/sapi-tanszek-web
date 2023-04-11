<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAffiliate;
use App\Http\Requests\UpdateUserRequest;
use App\Mail\AffiliateRegistrationReceived;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use App\Models\Tanar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
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
        $user = User::where('id', Auth::id())->first();
        return view('admin', compact('user'));
    }

    public function store(UpdateUserRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->pozicio = $request->pozicio;
        $user->leiras = $request->leiras;
        $user->avatar = $request->avatar;

        $user->save();

//        Mail::to('csongiika@gmail.com')
//            ->queue(new ContactMessageReceived($user));

        return response(['success' => true]);
    }
}
