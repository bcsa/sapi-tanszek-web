<?php

namespace App\Http\Controllers;

use App\Models\Rendezveny;
use Illuminate\Http\Request;

class RendezvenyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rendezvenyek = Rendezveny::orderBy('id','desc')->paginate(5);
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
            'idopont' => 'required',
            'kepek' => 'required',
            'leiras' => 'required',
            'tipus' => 'required',
        ]);

        Rendezveny::create($request->post());

        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen létrehoztad ezt a rendezvényt!');
    }

    public function show(int $rendezvenyId)
    {
        $rendezveny = Rendezveny::where('id', $rendezvenyId)->first();
        return view('rendezvenyek.show', compact('rendezveny'));
    }

    public function edit(int $rendezvenyId)
    {
        $rendezveny = Rendezveny::where('id', $rendezvenyId)->first();
        return view('rendezvenyek.edit', compact('rendezveny'));
    }

    public function update(Request $request, int $rendezvenyId)
    {
        $request->validate([
            'nev' => 'required',
            'helyszin' => 'required',
            'idopont' => 'required',
            'kepek' => 'required',
            'leiras' => 'required',
            'tipus' => 'required',
        ]);

        $rendezveny = Rendezveny::where('id', $rendezvenyId)->first();

        $rendezveny->fill($request->post())->save();

        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen frissítetted ezt a rendezvényt!');
    }

    public function destroy(int $rendezvenyId)
    {
        $rendezveny = Rendezveny::where('id', $rendezvenyId)->first();
        $rendezveny->delete();
        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen törölted ezt a rendezvényt!');
    }
}
