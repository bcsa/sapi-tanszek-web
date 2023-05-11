@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Rendezvény részletek

                        <div class="float-end">
                            <v-btn small href="{{ route('rendezvenyek.index') }}">Vissza</v-btn>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény ID:</strong>
                                {{ $rendezveny->id }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény név:</strong>
                                {{ $rendezveny->nev }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény helyszín:</strong>
                                {{ $rendezveny->helyszin }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény időpont:</strong>
                                {{ $rendezveny->idopont->toDateString() }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény képek:</strong>
                                @foreach ((array) $rendezveny->kepek as $kep)
                                    <img src="{{ asset('storage/kepek/'.$kep) }}" width="150" height="auto" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény leírás:</strong>
                                {{ $rendezveny->leiras }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény típus:</strong>
                                {{ $rendezveny->tipus }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény hozzáadva:</strong>
                                {{ $rendezveny->created_at }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény frissítve:</strong>
                                {{ $rendezveny->updated_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
