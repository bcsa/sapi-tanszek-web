<?php

namespace App\Http\Controllers;

use App\Models\Rendezveny;
use App\Models\Tanar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TanarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        if (request('s')) {
            $tanarok = $this->search(request('s'));
        } else {
            $tanarok = Tanar::orderBy('id', 'desc')->cursorPaginate(10);
        }

        return view('tanarok.list', compact('tanarok'));
    }

    public function search($var)
    {
        $tanarok = Tanar::orderBy('id', 'desc')
            ->where('nev', 'like', "%$var%")
            ->orWhere('email', 'like', "%$var%")
            ->orWhere('pozicio', 'like', "%$var%")
            ->cursorPaginate(10);

        return $tanarok;
    }

    public function index()
    {
        $tanarok = Tanar::orderBy('id', 'desc')->paginate(10);
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
            'nev' => 'required',
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

        $tanar = Tanar::create($data->all());

        if ($request->input('rendezvenyek')) {
            $tanar->rendezvenyek()->sync(explode(",", $request->input('rendezvenyek')));
        }

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen létrehoztad ezt a tanárt!');
    }

    public function show(Tanar $tanar)
    {
        return view('tanarok.show', compact('tanar'));
    }

    public function edit(Tanar $tanar)
    {
        $rendezvenyek = Rendezveny::orderBy('idopont', 'desc')->get();
        return view('tanarok.edit', compact('tanar', 'rendezvenyek'));
    }

    public function update(Request $request, Tanar $tanar)
    {
        $request->validate([
            'nev' => 'required',
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
        }

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen frissítetted ezt a tanárt!');
    }

    public function destroy(Tanar $tanar)
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
