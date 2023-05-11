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

        if($request->hasFile('avatar'))
        {
            $allowedExtensions = ['jpg','jpeg','png'];
            $file = $request->file('avatar');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedExtensions);

            if($check) {
                $file->move(storage_path('app/public/kepek'), $filename);
            } else {
                return false;
            }
        }

        $data = collect($request->all());
        $data->put('avatar', $filename);

        Tanar::create($data->all());

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen létrehoztad ezt a rendezvényt!');
    }

    public function show(Tanar $tanar)
    {
        return view('tanarok.show', compact('tanar'));
    }

    public function edit(Tanar $tanar)
    {
        // TODO: avatar edit
        return view('tanarok.edit', compact('tanar'));
    }

    public function update(Request $request, Tanar $tanar)
    {
        $request->validate([
            'nev' => 'required',
            'email' => 'required',
            'pozicio' => 'required',
            'bio' => 'required',
            'avatar' => 'required',
        ]);

        $tanar->fill($request->post())->save();

        return redirect()->route('tanarok.index')->with('success', 'Sikeresen frissítetted ezt a tanárt!');
    }

    public function destroy(Tanar $tanar)
    {
        $tanar->delete();
        return redirect()->route('tanarok.index')->with('success', 'Sikeresen törölted ezt a tanárt!');
    }
}
