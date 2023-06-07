<?php

namespace App\Http\Controllers;

use App\Models\Rendezveny;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

//TODO: soft-delete

class RendezvenyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show', 'home', 'search', 'toggleTanarRelation']]);
    }

    public function home()
    {
        if (request('s')) {
            $rendezvenyek = $this->search(request('s'));
        } else {
            $rendezvenyek = Rendezveny::orderBy('idopont', 'desc')->cursorPaginate(10);
        }

        return view('home', compact('rendezvenyek'));
    }

    public function search($var)
    {
        $rendezvenyek = Rendezveny::orderBy('idopont', 'desc')
            ->where('nev', 'like', "%$var%")
            ->orWhere('leiras', 'like', "%$var%")
            ->orWhere('idopont', 'like', "%$var%")
            ->orWhere('helyszin', 'like', "%$var%")
            ->orWhere('tipus', 'like', "%$var%")
            ->cursorPaginate(10);

        return $rendezvenyek;
    }

    public function index()
    {
        $rendezvenyek = Rendezveny::orderBy('idopont', 'desc')->paginate(10);
        return view('rendezvenyek.index', compact('rendezvenyek'));
    }

    public function create()
    {
        $tanarok = User::orderBy('name', 'asc')->get();
        return view('rendezvenyek.create', compact('tanarok'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required',
            'idopont' => 'required|date',
            'helyszin' => 'required',
            'resztvevok' => 'nullable',
            'tipus' => 'required',
            'leiras' => 'required',
            'kepek.*' => 'image',
        ], [
            'kepek.*.image' => 'Csak képek!',
        ]);

        $data = collect($request->all());

        if($request->hasFile('kepek'))
        {
            $files = $request->file('kepek');

            foreach($files as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(storage_path('app/public/kepek'), $filename);

                $kepek[] = $filename;
            }

            $data->put('kepek', $kepek);
        }

        $rendezveny = Rendezveny::create($data->all());

        if ($request->input('tanarok')) {
            $rendezveny->tanarok()->sync(explode(",", $request->input('tanarok')));
        }

        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen létrehoztad ezt a rendezvényt!');
    }

    public function show(Rendezveny $rendezveny)
    {
        return view('rendezvenyek.show', compact('rendezveny'));
    }

    public function edit(Rendezveny $rendezveny)
    {
        $tanarok = User::orderBy('name', 'asc')->get();
        return view('rendezvenyek.edit', compact('rendezveny', 'tanarok'));
    }

    public function update(Request $request, Rendezveny $rendezveny)
    {
        // TODO: kepek edit
        $request->validate([
            'nev' => 'required',
            'idopont' => 'required|date',
            'helyszin' => 'required',
            'resztvevok' => 'nullable',
            'tipus' => 'required',
            'kepek' => 'nullable',
            'leiras' => 'required',
        ]);

        $rendezveny->fill($request->post())->save();

        if ($request->input('tanarok')) {
            $rendezveny->tanarok()->sync(explode(",", $request->input('tanarok')));
        }

        return redirect()->route('rendezvenyek.show', $rendezveny->id)->with('success', 'Sikeresen frissítetted ezt a rendezvényt!');
    }

    public function destroy(Rendezveny $rendezveny)
    {
        if ($rendezveny->kepek) {
            foreach($rendezveny->kepek as $kep) {
                if (File::exists(storage_path('app/public/kepek') . '/' . $kep)) {
                    File::delete(storage_path('app/public/kepek') . '/' . $kep);
                }
            }
        }

        $rendezveny->delete();

        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen törölted ezt a rendezvényt!');
    }

    public function toggleTanarRelation(Rendezveny $rendezveny)
    {
        $tanar_id = Auth::user()->id;

        $toggle = $rendezveny->tanarok()->toggle($tanar_id);

        return redirect()->route('rendezvenyek.show', $rendezveny->id)
            ->with('success', $toggle['attached'] ? 'Sikeresen hozzáadtad magad ehhez a rendezvényhez!' : 'Sikeresen törölted magad erről a rendezvényről!');
    }
}
