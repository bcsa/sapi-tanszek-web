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

                    {{ $tanar }}
                </div>
            </div>
        </div>
    </div>
@endsection
