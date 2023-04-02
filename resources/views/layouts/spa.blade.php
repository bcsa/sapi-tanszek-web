@extends('layouts.html')

@push('css')

@endpush

@section('wrapper')
    <v-app>
        <router-view></router-view>
    </v-app>
@endsection
