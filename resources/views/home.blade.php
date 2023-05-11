@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Rendezvények
                </div>

                <v-row>
                    <v-col cols="11" class="mx-auto">
                        <v-text-field
                            v-model="searchTerm"
                            hide-details
                            label="Keresés"
                            outlined
                            single-line
                            append-icon="fas fa-times"
                            @click:append="searchTerm = null; selectedFilter = null"
                            @keydown.enter="search()"
                        ></v-text-field>
                    </v-col>
                </v-row>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($rendezvenyek as $rendezveny)
                        <v-row class="rendezveny-wrapper">
                            <v-col cols="1" class="details text-center">
                                <div class="datum nap">
                                    {{ $rendezveny->nap }}
                                </div>

                                <div class="datum honap">
                                    {{ $rendezveny->honap }}
                                </div>

                                <div class="datum ev">
                                    {{ $rendezveny->ev }}
                                </div>
                            </v-col>

                            <v-col cols="3" class="text-center">
                                @if ($rendezveny->kepek)
                                    <img src="{{ asset('storage/kepek/' . $rendezveny->kepek[0]) }}" width="150" height="auto" alt="">
                                @endif
                            </v-col>

                            <v-col cols="6">
                                <h2>{{ $rendezveny->nev }}</h2>
                                <h5>{{ Str::limit($rendezveny->leiras, 200) }}</h5>
                            </v-col>

                            <v-col cols="2" class="details helyszin">
                                {{ $rendezveny->helyszin }}
                            </v-col>
                        </v-row>
                    @endforeach

                    {!! $rendezvenyek->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        let homeMixin = {
            data: {
                searchTerm: null,
                selectedFilter: null,
            },

            methods: {
                search() {
                    console.log(this.searchTerm)
                }
            },
        }

        window.mixins.push(homeMixin)
    </script>
@endpush
