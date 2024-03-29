@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        Tanár részletek

                        <div class="float-end">
                            @if (Auth::user()->is_admin)
                                <v-btn small href="{{ route('tanarok.edit', $tanar->id) }}">Módosítás</v-btn>
                            @endif

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
                                {{ $tanar->name }}
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
{{--                        <div class="col-10 mx-auto">--}}
{{--                            <div class="form-group">--}}
{{--                                <strong>Tanár leírás:</strong>--}}
{{--                                {{ $tanar->bio }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        @if ($tanar->rendezvenyek->isNotEmpty())
                            <div class="col-10 mx-auto">
                                <div class="form-group">
                                    <strong>Tanár rendezvényei:</strong>

                                    <v-list dense>
                                        <v-list-item
                                            v-for="rendezveny in tanarRendezvenyei"
                                            :key="rendezveny.id"
                                        >
                                            <v-list-item-avatar>
                                                <v-img
                                                    :src="getRendezvenyAvatar(rendezveny)"
                                                ></v-img>
                                            </v-list-item-avatar>

                                            <v-list-item-content>
                                                <v-list-item-title v-text="rendezveny.nev"></v-list-item-title>
                                                <v-list-item-subtitle v-text="rendezveny.idopont"></v-list-item-subtitle>
                                                <v-list-item-subtitle v-text="rendezveny.helyszin"></v-list-item-subtitle>
                                            </v-list-item-content>

                                            <v-list-item-action>
                                                <v-btn small :href="route('rendezvenyek.show', rendezveny.id)">
                                                    Megtekintés
                                                </v-btn>
                                            </v-list-item-action>

                                            @if (Auth::user()->id == $tanar->id)
                                                <v-list-item-action>
                                                    <v-btn small :href="route('rendezvenyek.toggle-relation', rendezveny.id)">
                                                        Törlés
                                                    </v-btn>
                                                </v-list-item-action>
                                            @endif
                                        </v-list-item>
                                    </v-list>
                                </div>
                            </div>
                        @endif
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Tanár avatar:</strong>
                                @if ($tanar->avatar)
                                    <img src="{{ asset('storage/avatars/' . $tanar->avatar) }}" width="150" height="auto" alt="">
                                @else
                                    <img src="{{ asset('storage/avatars/defpic.jpg') }}" width="150" height="auto" alt="">
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

@push('js')
    <script type="text/javascript">
        let homeMixin = {
            data: {
                tanarRendezvenyei: {!! json_encode($tanar->rendezvenyek) !!},
            },

            methods: {
                getRendezvenyAvatar(rendezveny) {
                    if (rendezveny.kepek) {
                        return "{{ asset('storage/kepek/') . '/' }}" + rendezveny.kepek[0]
                    } else {
                        return "{{ asset('storage/avatars/defpic.jpg') }}"
                    }
                },
            },
        }

        window.mixins.push(homeMixin)
    </script>
@endpush
