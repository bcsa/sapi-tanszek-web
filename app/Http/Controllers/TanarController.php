<?php

namespace App\Http\Controllers;

use App\Models\Rendezveny;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

//TODO: soft-delete

class TanarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show', 'home', 'search']]);
    }

    public function home()
    {
        $tanarok = User::orderBy('id', 'desc')->paginate(10);

        return view('tanarok.list', compact('tanarok'));
    }

    public function search(Request $request)
    {
        $query = User::select('*');

        if ($term = $request->input('search_term')) {
            $query->where('name', 'like', "%$term%")
                ->orWhere('email', 'like', "%$term%")
                ->orWhere('pozicio', 'like', "%$term%");
        }

        $tanarok = $query->paginate(10);

        return $tanarok;
    }

    public function index()
    {
        $tanarok = User::orderBy('id', 'desc')->paginate(10);
        return view('tanarok.index', compact('tanarok'));
    }

    public function create()
    {
        $rendezvenyek = Rendezveny::orderBy('idopont', 'desc')->get();
        return view('tanarok.create', compact('rendezvenyek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pozicio' => 'required',
            'bio' => 'nullable',
            'avatar' => 'image|max:1024',
        ]);

        if (User::where('email', $request->input('email'))->exists()) {
            return redirect()->route('tanarok.index')->with('error', 'Létező felhasználó!');
        }

        $data = collect($request->all());

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();

            $file->move(storage_path('app/public/avatars'), $filename);

            $data->put('avatar', $filename);
        }

        $data->put('password', Str::random(10));

        $tanar = User::create($data->all());

        Password::sendResetLink(
            $request->only('email')
        );

        if ($request->input('rendezvenyek')) {
            $tanar->rendezvenyek()->sync(explode(",", $request->input('rendezvenyek')));
        }

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen létrehoztad ezt a tanárt!');
    }

    public function show(User $tanar)
    {
        return view('tanarok.show', compact('tanar'));
    }

    public function edit(User $tanar)
    {
        $rendezvenyek = Rendezveny::orderBy('idopont', 'desc')->get();
        return view('tanarok.edit', compact('tanar', 'rendezvenyek'));
    }

    public function update(Request $request, User $tanar)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pozicio' => 'required',
            'bio' => 'nullable',
            'avatar' => 'image|max:1024',
        ]);

        $data = collect($request->all());

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();

            $file->move(storage_path('app/public/avatars'), $filename);

            $data->put('avatar', $filename);
        }

        $tanar->fill($data->all())->save();

        if ($request->input('rendezvenyek')) {
            $tanar->rendezvenyek()->sync(explode(",", $request->input('rendezvenyek')));
        } else {
            $tanar->rendezvenyek()->detach();
        }

        return redirect()->route('tanarok.show', $tanar->id)->with('success', 'Sikeresen frissítetted ezt a tanárt!');
    }

    public function destroy(User $tanar)
    {
        if ($tanar->avatar) {
            if (File::exists(storage_path('app/public/avatars') . '/' . $tanar->avatar)) {
                File::delete(storage_path('app/public/avatars') . '/' . $tanar->avatar);
            }
        }

        $tanar->delete();

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen törölted ezt a tanárt!');
    }
}
