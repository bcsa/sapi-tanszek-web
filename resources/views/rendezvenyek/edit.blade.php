@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Rendezvény módosítása

                        <div class="float-end">
                            <v-btn small href="{{ route('rendezvenyek.index') }}">Vissza</v-btn>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény név:</strong>
                                        <input type="text" name="nev" value="{{ $rendezveny->nev }}" class="form-control" placeholder="Rendezvény név">
                                        @error('nev')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény helyszín:</strong>
                                        <input type="text" name="helyszin" value="{{ $rendezveny->helyszin }}" class="form-control" placeholder="Rendezvény helyszín">
                                        @error('helyszin')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény időpont:</strong>
                                        <input type="text" name="pozicio" value="{{ $rendezveny->pozicio }}" class="form-control" placeholder="Rendezvény időpont">
                                        @error('idopont')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény képek:</strong>
                                        @foreach ((array) $rendezveny->kepek as $kep)
                                            <img src="{{ asset('storage/kepek/'.$kep) }}" width="150" height="auto" alt="">
                                        @endforeach
                                        @error('kepek')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény leírás:</strong>
                                        <input type="text" name="leiras" value="{{ $rendezveny->leiras }}" class="form-control" placeholder="Rendezvény leírás">
                                        @error('leiras')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény típus:</strong>
                                        <input type="text" name="tipus" value="{{ $rendezveny->tipus }}" class="form-control" placeholder="Rendezvény típus">
                                        @error('tipus')
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
