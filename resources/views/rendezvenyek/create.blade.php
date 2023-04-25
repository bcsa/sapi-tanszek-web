@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Új rendezvény

                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('rendezvenyek.index') }}">Vissza</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('rendezvenyek.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény neve:</strong>
                                        <input type="text" name="nev" class="form-control" placeholder="Rendezvény neve">
                                        @error('nev')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény email:</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Rendezvény email">
                                        @error('email')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény pozíció:</strong>
                                        <input type="text" name="pozicio" class="form-control" placeholder="Rendezvény pozíció">
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
