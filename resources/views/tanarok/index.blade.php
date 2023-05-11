@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tanárok

                        <div class="float-end">
                            <v-btn small href="{{ route('tanarok.create') }}">Új tanár</v-btn>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanár neve</th>
                                    <th>Tanár email</th>
                                    <th>Tanár poziciója</th>
                                    <th>Tanár leírása</th>
                                    <th>Tanár avatar</th>
                                    <th>Műveletek</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tanarok as $tanar)
                                    <tr>
                                        <td>{{ $tanar->id }}</td>
                                        <td>{{ $tanar->nev }}</td>
                                        <td>{{ $tanar->email }}</td>
                                        <td>{{ $tanar->pozicio }}</td>
                                        <td>{{ $tanar->bio }}</td>
                                        <td>
                                            <img src="{{ asset('storage/kepek/'.$tanar->avatar) }}" width="150" height="auto" alt="">
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('tanarok.destroy', $tanar->id) }}"
                                                method="post"
                                            >
                                                <v-btn block small rounded class="mb-3" href="{{ route('tanarok.show', $tanar->id) }}">
                                                    Részletek
                                                </v-btn>
                                                <v-btn block small rounded class="mb-3" href="{{ route('tanarok.edit', $tanar->id) }}">
                                                    Módosítás
                                                </v-btn>
                                                @csrf
                                                @method('DELETE')
                                                <v-btn block small rounded type="submit">
                                                    Törlés
                                                </v-btn>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $tanarok->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
