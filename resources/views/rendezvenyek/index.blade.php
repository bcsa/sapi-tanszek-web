@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        Rendezvények

                        <div class="float-end">
                            @if (Auth::user()->is_admin)
                                <v-btn small href="{{ route('rendezvenyek.create') }}">Új rendezvény</v-btn>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rendezvény neve</th>
                                    <th>Rendezvény időpontja</th>
                                    <th>Rendezvény helyszíne</th>
                                    <th>Rendezvény résztvevőinek száma</th>
                                    <th>Rendezvény típusa</th>
                                    <th>Rendezvény képek</th>
                                    <th>Rendezvény leírása</th>
                                    <th>Műveletek</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rendezvenyek as $rendezveny)
                                    <tr>
                                        <td>{{ $rendezveny->id }}</td>
                                        <td>{{ $rendezveny->nev }}</td>
                                        <td>{{ $rendezveny->idopont }}</td>
                                        <td>{{ $rendezveny->helyszin }}</td>
                                        <td>{{ $rendezveny->resztvevok }}</td>
                                        <td>{{ $rendezveny->tipus }}</td>
                                        <td>
                                            @if ($rendezveny->kepek)
                                                <img src="{{ asset('storage/kepek/' . $rendezveny->kepek[0]) }}" width="150" height="auto" alt="">
                                            @else
                                                <img src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" width="150" height="auto" alt="">
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($rendezveny->leiras, 200) }}</td>
                                        <td>
                                            <form
                                                action="{{ route('rendezvenyek.destroy', $rendezveny->id) }}"
                                                method="post"
                                            >
                                                <v-btn block small rounded class="mb-3" href="{{ route('rendezvenyek.show', $rendezveny->id) }}">
                                                    Részletek
                                                </v-btn>

                                                @if (Auth::user()->is_admin)
                                                    <v-btn block small rounded class="mb-3" href="{{ route('rendezvenyek.edit', $rendezveny->id) }}">
                                                        Módosítás
                                                    </v-btn>
                                                    @csrf
                                                    @method('DELETE')
                                                    <v-btn block small rounded class="mb-3" type="submit">
                                                        Törlés
                                                    </v-btn>
                                                @endif
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
