@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Rendezvények

                        <div class="float-end">
                            <a class="btn btn-success" href="{{ route('rendezvenyek.create') }}">Új rendezvény</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rendezvény neve</th>
                                    <th>Rendezvény helyszíne</th>
                                    <th>Rendezvény időpontja</th>
                                    <th>Rendezvény képek</th>
                                    <th>Rendezvény leírása</th>
                                    <th>Rendezvény típusa</th>
                                    <th>Műveletek</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rendezvenyek as $rendezveny)
                                    <tr>
                                        <td>{{ $rendezveny->id }}</td>
                                        <td>{{ $rendezveny->nev }}</td>
                                        <td>{{ $rendezveny->helyszin }}</td>
                                        <td>{{ $rendezveny->idopont }}</td>
                                        <td>{{ $rendezveny->kepek }}</td>
                                        <td>{{ $rendezveny->leiras }}</td>
                                        <td>{{ $rendezveny->tipus }}</td>
                                        <td>
                                            <form
                                                action="{{ route('rendezvenyek.destroy', $rendezveny->id) }}"
                                                method="post"
                                            >
                                                <a class="btn btn-info" href="{{ route('tanarok.show', $tanar->id) }}">
                                                    Részletek
                                                </a>
                                                <a class="btn btn-primary" href="{{ route('rendezvenyek.edit', $rendezveny->id) }}">
                                                    Módosítás
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Törlés
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $rendezvenyek->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
