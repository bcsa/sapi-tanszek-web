@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tanárok

                        <div class="float-end">
                            @if (Auth::user()->is_admin)
                                <v-btn small href="{{ route('tanarok.create') }}">Új tanár</v-btn>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanár neve</th>
                                    <th>Tanár email</th>
                                    <th>Tanár poziciója</th>
{{--                                    <th>Tanár leírása</th>--}}
                                    <th>Tanár avatar</th>
                                    <th>Műveletek</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tanarok as $tanar)
                                    <tr>
                                        <td>{{ $tanar->id }}</td>
                                        <td>{{ $tanar->name }}</td>
                                        <td>{{ $tanar->email }}</td>
                                        <td>{{ $tanar->pozicio }}</td>
{{--                                        <td>{{ Str::limit($tanar->bio, 200) }}</td>--}}
                                        <td>
                                            @if ($tanar->avatar)
                                                <img src="{{ asset('storage/avatars/'.$tanar->avatar) }}" width="150" height="auto" alt="">
                                            @else
                                                <img src="{{ asset('storage/avatars/defpic.jpg') }}" width="150" height="auto" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('tanarok.destroy', $tanar->id) }}"
                                                method="post"
                                            >
                                                <v-btn block small rounded class="mb-3" href="{{ route('tanarok.show', $tanar->id) }}">
                                                    Részletek
                                                </v-btn>

                                                @if (Auth::user()->is_admin)
                                                    <v-btn block small rounded class="mb-3" href="{{ route('tanarok.edit', $tanar->id) }}">
                                                        Módosítás
                                                    </v-btn>
                                                    @csrf
                                                    @method('DELETE')
                                                    <v-btn block small rounded type="submit">
                                                        Törlés
                                                    </v-btn>
                                                @endif
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
