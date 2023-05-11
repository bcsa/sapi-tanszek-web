@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tanár módosítása

                        <div class="float-end">
                            <v-btn small href="{{ route('tanarok.index') }}">Vissza</v-btn>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('tanarok.update', $tanar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár név:</strong>
                                        <input type="text" name="nev" value="{{ $tanar->nev }}" class="form-control"
                                               placeholder="Tanár név">
                                        @error('nev')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár email:</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Tanár email"
                                               value="{{ $tanar->email }}">
                                        @error('email')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár pozíció:</strong>
                                        <input type="text" name="pozicio" value="{{ $tanar->pozicio }}" class="form-control"
                                               placeholder="Tanár pozíció">
                                        @error('pozicio')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár leírás:</strong>
                                        <input type="text" name="bio" value="{{ $tanar->bio }}" class="form-control"
                                               placeholder="Tanár leírás">
                                        @error('bio')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár avatar:</strong>
                                        <img src="{{ asset('storage/kepek/'.$tanar->avatar) }}" width="150" height="auto" alt="">
                                        <input type="file" accept="image/*" name="avatar" class="form-control" placeholder="Tanár avatar"/>
                                        @error('avatar')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <v-btn small type="submit">Módosítás</v-btn>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
