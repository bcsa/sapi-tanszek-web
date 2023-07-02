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
                        Rendezvény részletek

                        <div class="float-end">
                            @if (Auth::user()->is_admin)
                                <v-btn
                                    small
                                    href="{{ route('rendezvenyek.edit', $rendezveny->id) }}"
                                >
                                    Módosítás
                                </v-btn>
                            @endif

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
                                <strong>Rendezvény időpont:</strong>
                                {{ $rendezveny->idopont }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény helyszín:</strong>
                                {{ $rendezveny->helyszin }}
                            </div>
                        </div>
                        @if ($rendezveny->resztvevok)
                            <div class="col-10 mx-auto">
                                <div class="form-group">
                                    <strong>Rendezvény résztvevőinek száma:</strong>
                                    {{ $rendezveny->resztvevok }}
                                </div>
                            </div>
                        @endif
                        @if ($rendezveny->tanarok->isNotEmpty())
                            <div class="col-10 mx-auto">
                                <div class="form-group">
                                    <strong>Rendezvényen résztvevő tanárok:</strong>

                                    <v-list dense>
                                        <v-list-item
                                            v-for="tanar in rendezvenyTanarok"
                                            :key="tanar.id"
                                        >
                                            <v-list-item-avatar>
                                                <v-img
                                                    :src="getTanarAvatar(tanar)"
                                                ></v-img>
                                            </v-list-item-avatar>

                                            <v-list-item-content>
                                                <v-list-item-title v-text="tanar.name"></v-list-item-title>
                                                <v-list-item-subtitle v-text="tanar.pozicio"></v-list-item-subtitle>
                                            </v-list-item-content>

                                            <v-list-item-action
                                                v-if="tanar.id === userId"
                                            >
                                                <v-btn small href="{{ route('rendezvenyek.toggle-relation', $rendezveny->id) }}">
                                                    Törlés
                                                </v-btn>
                                            </v-list-item-action>
                                        </v-list-item>
                                    </v-list>
                                </div>
                            </div>
                        @endif
                        @if (!Auth::user()->is_admin)
                            <div
                                v-if="!relationExists"
                                class="col-10 mx-auto"
                            >
                                <div class="form-group">
                                    <v-btn small href="{{ route('rendezvenyek.toggle-relation', $rendezveny->id) }}">
                                        Hozzáadás
                                    </v-btn>
                                </div>
                            </div>
                        @endif
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény típus:</strong>
                                {{ $rendezveny->tipus }}
                            </div>
                        </div>
                        <div class="col-10 mx-auto">
                            <div class="form-group">
                                <strong>Rendezvény képek:</strong>
                                @if ($rendezveny->kepek)
                                    @foreach ((array) $rendezveny->kepek as $kep)
                                        <img src="{{ asset('storage/kepek/' . $kep) }}" width="150" height="auto" alt="">
                                    @endforeach
                                @else
                                    <img src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" width="150" height="auto" alt="">
                                @endif
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

@push('js')
    <script type="text/javascript">
        let homeMixin = {
            data: {
                rendezvenyTanarok: {!! json_encode($rendezveny->tanarok) !!},
                userId: {!! json_encode(Auth::user()->id) !!},
            },

            computed: {
                relationExists() {
                    return this.rendezvenyTanarok.some(elem => elem.id === this.userId)
                }
            },

            methods: {
                getTanarAvatar(tanar) {
                    if (tanar.avatar) {
                        return "{{ asset('storage/avatars/') . '/' }}" + tanar.avatar
                    } else {
                        return "{{ asset('storage/avatars/defpic.jpg') }}"
                    }
                },
            },
        }

        window.mixins.push(homeMixin)
    </script>
@endpush
