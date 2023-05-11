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
        $rendezvenyek = Rendezveny::orderBy('id','desc')->cursorPaginate(10);
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
            'tipus' => 'required',
        ]);

        if($request->hasFile('kepek'))
        {
            $allowedExtensions = ['jpg','jpeg','png'];
            $files = $request->file('kepek');

            foreach($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedExtensions);

                if($check) {
                    $file->move(storage_path('app/public/kepek'), $filename);
                    $kepek[] = $filename;
                } else {
                    return false;
                }
            }
        }

        $data = collect($request->all());
        $data->put('kepek', $kepek);

        Rendezveny::create($data->all());

        return redirect()->route('rendezvenyek.index')->with('success', 'Sikeresen létrehoztad ezt a rendezvényt!');
    }

    public function show(Rendezveny $rendezveny)
    {
        return view('rendezvenyek.show', compact('rendezveny'));
    }

    public function edit(Rendezveny $rendezveny)
    {
        // TODO: kepek edit
        return view('rendezvenyek.edit', compact('rendezveny'));
    }

    public function update(Request $request, Rendezveny $rendezveny)
    {
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
