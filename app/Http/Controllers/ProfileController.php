<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        $user = User::where('id', Auth::id())->first();
        return view('profile', compact('user'));
    }

    public function store(UpdateUserRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->pozicio = $request->pozicio;

        if($request->hasFile('avatar'))
        {
            if (File::exists(storage_path('app/public/avatars') . '/' . $user->avatar)) {
                File::delete(storage_path('app/public/avatars') . '/' . $user->avatar);
            }

            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();

            $file->move(storage_path('app/public/avatars'), $filename);

            $user->avatar = $filename;
        }

        $user->save();

//        Mail::to('csongiika@gmail.com')
//            ->queue(new ContactMessageReceived($user));

        return response(['success' => true]);
    }
}
