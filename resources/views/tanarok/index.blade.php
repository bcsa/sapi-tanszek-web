@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tanárok

                        <div class="float-end">
                            <a class="btn btn-success" href="{{ route('tanarok.create') }}">Új tanár</a>
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
                                        <td>{{ $tanar->avatar }}</td>
                                        <td>
                                            <form
                                                action="{{ route('tanarok.destroy', $tanar->id) }}"
                                                method="post"
                                            >
                                                <a class="btn btn-info" href="{{ route('tanarok.show', $tanar->id) }}">
                                                    Részletek
                                                </a>
                                                <a class="btn btn-primary" href="{{ route('tanarok.edit', $tanar->id) }}">
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
                        {!! $tanarok->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
