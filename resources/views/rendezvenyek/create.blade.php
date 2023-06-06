@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Új rendezvény

                        <div class="float-end">
                            <v-btn small href="{{ route('rendezvenyek.index') }}">Vissza</v-btn>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('rendezvenyek.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény név:</strong>
                                        <input type="text" name="nev" class="form-control" placeholder="Rendezvény név">
                                        @error('nev')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény időpont:</strong>
                                        <input type="date" name="idopont" class="form-control" placeholder="Rendezvény időpont">
                                        @error('idopont')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény helyszín:</strong>
                                        <input type="text" name="helyszin" class="form-control" placeholder="Rendezvény helyszín">
                                        @error('helyszin')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény résztvevőinek száma:</strong>
                                        <input type="text" name="resztvevok" class="form-control" placeholder="Rendezvény résztvevőinek száma">
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
                                                    <v-list-item-title v-text="tanar.name"></v-list-item-title>
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
                                                    <span>@{{ item.name }}</span>
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
                                                    <v-list-item-title v-text="item.name"></v-list-item-title>
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
                                        <input type="text" name="tipus" class="form-control" placeholder="Rendezvény típus">
                                        @error('tipus')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény képek:</strong>
                                        <input type="file" accept="image/*" name="kepek[]" class="form-control" multiple />
                                        @error('kepek.*')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Rendezvény leírás:</strong>
                                        <textarea name="leiras" class="form-control" placeholder="Rendezvény leírás" rows="5"></textarea>
                                        @error('leiras')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-10 mx-auto">
                                    <v-btn small type="submit" id="submit">Létrehozás</v-btn>
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
                rendezvenyTanarok: [],
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
