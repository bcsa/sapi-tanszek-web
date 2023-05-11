@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Rendezvények

                        <div class="float-end">
                            <v-btn small href="{{ route('rendezvenyek.create') }}">Új rendezvény</v-btn>
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
                                        <td>
                                            @foreach ((array) $rendezveny->kepek as $kep)
                                                <img src="{{ asset('storage/kepek/'.$kep) }}" width="150" height="auto" alt="">
                                            @endforeach
                                        </td>
                                        <td>{{ $rendezveny->leiras }}</td>
                                        <td>{{ $rendezveny->tipus }}</td>
                                        <td>
                                            <form
                                                action="{{ route('rendezvenyek.destroy', $rendezveny->id) }}"
                                                method="post"
                                            >
                                                <v-btn block small rounded class="mb-3" href="{{ route('rendezvenyek.show', $rendezveny->id) }}">
                                                    Részletek
                                                </v-btn>
                                                <v-btn block small rounded class="mb-3" href="{{ route('rendezvenyek.edit', $rendezveny->id) }}">
                                                    Módosítás
                                                </v-btn>
                                                @csrf
                                                @method('DELETE')
                                                <v-btn block small rounded class="mb-3" type="submit">
                                                    Törlés
                                                </v-btn>
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
