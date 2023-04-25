<?php

namespace App\Http\Controllers;

use App\Models\Tanar;
use Illuminate\Http\Request;

class TanarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tanarok = Tanar::orderBy('id','desc')->paginate(5);
        return view('tanarok.index', compact('tanarok'));
    }

    public function create()
    {
        return view('tanarok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required',
            'email' => 'required',
            'pozicio' => 'required',
            'bio' => 'required',
            'avatar' => 'required',
        ]);

        Tanar::create($request->post());

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen létrehoztad ezt a rendezvényt!');
    }

    public function show(int $tanarId)
    {
        $tanar = Tanar::where('id', $tanarId)->first();
        return view('tanarok.show', compact('tanar'));
    }

    public function edit(int $tanarId)
    {
        $tanar = Tanar::where('id', $tanarId)->first();
        return view('tanarok.edit', compact('tanar'));
    }

    public function update(Request $request, int $tanarId)
    {
        $request->validate([
            'nev' => 'required',
            'email' => 'required',
            'pozicio' => 'required',
            'bio' => 'required',
            'avatar' => 'required',
        ]);

        $tanar = Tanar::where('id', $tanarId)->first();

        $tanar->fill($request->post())->save();

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen frissítetted ezt a rendezvényt!');
    }

    public function destroy(int $tanarId)
    {
        $tanar = Tanar::where('id', $tanarId)->first();
        $tanar->delete();
        return redirect()->route('tanarok.index')->with('success', 'Sikeresen törölted ezt a rendezvényt!');
    }
}
