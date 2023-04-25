@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Új tanár

                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('tanarok.index') }}">Vissza</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('tanarok.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár neve:</strong>
                                        <input type="text" name="nev" class="form-control" placeholder="Tanár neve">
                                        @error('nev')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár email:</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Tanár email">
                                        @error('email')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár pozíció:</strong>
                                        <input type="text" name="pozicio" class="form-control" placeholder="Tanár pozíció">
                                        @error('pozicio')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <button type="submit" class="btn btn-primary">Létrehozás</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
