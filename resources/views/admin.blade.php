@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/admin">
                        <div class="row mx-auto justify-content-center">
                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="kwhPrice">Pret energie (kWH)</label>
                                    <input type="number" class="form-control" id="kwhPrice" placeholder="Pret energie">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="napelemWatt">Putere panou (W)</label>
                                    <input type="number" class="form-control" id="napelemWatt" placeholder="Putere panou">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="napelemSzel">Latime panou (mm)</label>
                                    <input type="number" class="form-control" id="napelemSzel" name="napelemSzel" placeholder="Latime panou">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="napelemHossz">Lungime panou (mm)</label>
                                    <input type="number" class="form-control" id="napelemHossz" name="napelemHossz" placeholder="Lungime panou">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="napelemNegyzetmeter">Marime panou (m2)</label>
                                    <input type="number" class="form-control" id="napelemNegyzetmeter" name="napelemNegyzetmeter" placeholder="Marime panou">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
