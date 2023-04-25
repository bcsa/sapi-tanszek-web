@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Rendezvény részletek

                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('rendezvenyek.index') }}">Vissza</a>
                        </div>
                    </div>

                    {{ $rendezveny }}
                </div>
            </div>
        </div>
    </div>
@endsection
