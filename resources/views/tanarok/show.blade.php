@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tanár részletek

                        <div class="float-end">
                            <v-btn small href="{{ route('tanarok.index') }}">Vissza</v-btn>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár ID:</strong>
                                {{ $tanar->id }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár név:</strong>
                                {{ $tanar->nev }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár email:</strong>
                                {{ $tanar->email }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár pozíció:</strong>
                                {{ $tanar->pozicio }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár leírás:</strong>
                                {{ $tanar->bio }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár avatar:</strong>
                                @if ($tanar->avatar)
                                    <img src="{{ asset('storage/kepek/'.$tanar->avatar) }}" width="150" height="auto" alt="">
                                @else
                                    <img src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" width="150" height="auto" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár hozzáadva:</strong>
                                {{ $tanar->created_at }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár frissítve:</strong>
                                {{ $tanar->updated_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
