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
                        <form action="{{ route('rendezvenyek.update', $rendezveny->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <strong>Rendezvény időpont:</strong>
                                        <input type="date" name="idopont" value="{{ $rendezveny->idopont }}" class="form-control" placeholder="Rendezvény időpont">
                                        @error('idopont')
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
                                        <strong>Rendezvény résztvevőinek száma:</strong>
                                        <input type="text" name="resztvevok" value="{{ $rendezveny->resztvevok }}" class="form-control" placeholder="Rendezvény résztvevőinek száma">
                                        @error('resztvevok')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvényen résztvevő tanárok:</strong>

                                        <v-list dense>
                                            <v-list-item
                                                v-for="tanar in selectedTanarok"
                                                :key="tanar.id"
                                            >
                                                <v-list-item-avatar>
                                                    <v-img
                                                        :src="getTanarAvatar(tanar)"
                                                    ></v-img>
                                                </v-list-item-avatar>

                                                <v-list-item-content>
                                                    <v-list-item-title v-text="tanar.nev"></v-list-item-title>
                                                    <v-list-item-subtitle v-text="tanar.pozicio"></v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>

                                        <v-select
                                            v-model="rendezvenyTanarok"
                                            :items="tanarok"
                                            item-text="nev"
                                            item-value="id"
                                            multiple
                                            solo
                                            placeholder="Válassz tanárokat"
                                            name="tanarok"
                                        >
                                            <template v-slot:selection="{ item, index }">
                                                <v-chip v-if="index < 3">
                                                    <span>@{{ item.nev }}</span>
                                                </v-chip>
                                                <span
                                                    v-if="index === 3"
                                                    class="grey--text text-caption"
                                                >
                                                  (+@{{ rendezvenyTanarok.length - 3 }} másik)
                                                </span>
                                            </template>

                                            <template v-slot:item="{ item }">
                                                <v-checkbox
                                                    :input-value="selectedTanarok.some(elem => elem.id === item.id)"
                                                >
                                                </v-checkbox>

                                                <v-list-item-avatar
                                                    class="mx-3"
                                                >
                                                    <v-img
                                                        :src="getTanarAvatar(item)"
                                                    ></v-img>
                                                </v-list-item-avatar>

                                                <v-list-item-content>
                                                    <v-list-item-title v-text="item.nev"></v-list-item-title>
                                                    <v-list-item-subtitle v-text="item.pozicio"></v-list-item-subtitle>
                                                </v-list-item-content>
                                            </template>
                                        </v-select>
                                        @error('tanarok')
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
                                    <div class="form-group">
                                        <strong>Rendezvény képek:</strong>
                                        @foreach ((array) $rendezveny->kepek as $kep)
                                            <img src="{{ asset('storage/kepek/' . $kep) }}" width="150" height="auto" alt="">
                                        @endforeach

                                        <input type="file" accept="image/*" name="kepek[]" class="form-control" multiple />
                                        @error('kepek.*')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény leírás:</strong>
                                        <textarea name="leiras" class="form-control" placeholder="Rendezvény leírás" rows="5">{{ $rendezveny->leiras }}</textarea>
                                        @error('leiras')
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

@push('js')
    <script type="text/javascript">
        let homeMixin = {
            data: {
                tanarok: {!! json_encode($tanarok) !!},
                rendezvenyTanarok: {!! json_encode($rendezveny->tanarok->pluck('id')) !!},
            },

            computed: {
                selectedTanarok() {
                    return this.rendezvenyTanarok.map((id) => this.tanarok.find((el) => el.id === id))
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
