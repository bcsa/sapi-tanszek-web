<?php

namespace App\Http\Controllers;

use App\Models\Rendezveny;
use Illuminate\Http\Request;

class RendezvenyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        if (request('search')) {
            $var = request('search');

            $rendezvenyek = Rendezveny::orderBy('idopont','desc')
                ->where('leiras', 'like', "%$var%")
                ->orWhere('nev', 'like', "%$var%")
                ->orWhere('idopont', 'like', "%$var%")
                ->orWhere('helyszin', 'like', "%$var%")
                ->orWhere('tipus', 'like', "%$var%")
                ->cursorPaginate(10);
        } else {
            $rendezvenyek = Rendezveny::orderBy('idopont','desc')->cursorPaginate(10);
        }

        return view('home', compact('rendezvenyek'));
    }

    public function index()
    {
        $rendezvenyek = Rendezveny::orderBy('idopont','desc')->paginate(10);
        return view('rendezvenyek.index', compact('rendezvenyek'));
    }

    public function create()
    {
        return view('rendezvenyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required',
            'helyszin' => 'required',
            'idopont' => 'required|date',
            'leiras' => 'required',
            'kepek.*' => 'image',
            'tipus' => 'required',
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

        Rendezveny::create($data->all());

        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen létrehoztad ezt a rendezvényt!');
    }

    public function search(Request $request)
    {
        $rendezvenyek = Rendezveny::orderBy('id','desc')
            ->where('leiras', 'like', "%$request->search_term%")
            ->orWhere('nev', 'like', "%$request->search_term%")
            ->orWhere('idopont', 'like', "%$request->search_term%")
            ->orWhere('helyszin', 'like', "%$request->search_term%")
            ->orWhere('tipus', 'like', "%$request->search_term%")
            ->cursorPaginate(10);

        return route('home', compact('rendezvenyek'));
    }

    public function show(Rendezveny $rendezveny)
    {
        return view('rendezvenyek.show', compact('rendezveny'));
    }

    public function edit(Rendezveny $rendezveny)
    {
        return view('rendezvenyek.edit', compact('rendezveny'));
    }

    public function update(Request $request, Rendezveny $rendezveny)
    {
        // TODO: kepek edit
        $request->validate([
            'nev' => 'required',
            'helyszin' => 'required',
            'idopont' => 'required|date',
            'kepek' => 'nullable',
            'leiras' => 'required',
            'tipus' => 'required',
        ]);

        $rendezveny->fill($request->post())->save();

        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen frissítetted ezt a rendezvényt!');
    }

    public function destroy(Rendezveny $rendezveny)
    {
        $rendezveny->delete();
        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen törölted ezt a rendezvényt!');
    }
}
