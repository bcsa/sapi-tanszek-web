@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tanár módosítása

                        <div class="float-end">
                            <v-btn small href="{{ route('tanarok.index') }}">Vissza</v-btn>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('tanarok.update', $tanar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár név:</strong>
                                        <input type="text" name="nev" value="{{ $tanar->nev }}" class="form-control"
                                               placeholder="Tanár név">
                                        @error('nev')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár email:</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Tanár email"
                                               value="{{ $tanar->email }}">
                                        @error('email')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár pozíció:</strong>
                                        <input type="text" name="pozicio" value="{{ $tanar->pozicio }}" class="form-control"
                                               placeholder="Tanár pozíció">
                                        @error('pozicio')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár rendezvényei:</strong>

                                        <v-list dense>
                                            <v-list-item
                                                v-for="rendezveny in selectedRendezvenyek"
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
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>

                                        <v-select
                                            v-model="rendezvenyTanarok"
                                            :items="rendezvenyek"
                                            item-text="nev"
                                            item-value="id"
                                            multiple
                                            solo
                                            name="rendezvenyek"
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
                                                    :input-value="selectedRendezvenyek.some(elem => elem.id === item.id)"
                                                >
                                                </v-checkbox>

                                                <v-list-item-avatar
                                                    class="mx-3"
                                                >
                                                    <v-img
                                                        :src="getRendezvenyAvatar(item)"
                                                    ></v-img>
                                                </v-list-item-avatar>

                                                <v-list-item-content>
                                                    <v-list-item-title v-text="item.nev"></v-list-item-title>
                                                    <v-list-item-subtitle v-text="item.idopont"></v-list-item-subtitle>
                                                </v-list-item-content>
                                            </template>
                                        </v-select>
                                        @error('rendezvenyek')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár leírás:</strong>
                                        <textarea name="bio" class="form-control" placeholder="Tanár leírás" rows="5">{{ $tanar->bio }}</textarea>
                                        @error('bio')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10 mx-auto">
                                    <div class="form-group">
                                        <strong>Tanár avatar:</strong>
                                        @if ($tanar->avatar)
                                            <img src="{{ asset('storage/avatars/'.$tanar->avatar) }}" width="150" height="auto" alt="">
                                        @else
                                            <img src="{{ asset('storage/avatars/defpic.jpg') }}" width="150" height="auto" alt="">
                                        @endif

                                        <input type="file" accept="image/*" name="avatar" class="form-control" placeholder="Tanár avatar"/>
                                        @error('avatar')
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
                rendezvenyek: {!! json_encode($rendezvenyek) !!},
                rendezvenyTanarok: {!! json_encode($tanar->rendezvenyek->pluck('id')) !!},
            },

            computed: {
                selectedRendezvenyek() {
                    return this.rendezvenyTanarok.map((id) => this.rendezvenyek.find((el) => el.id === id))
                }
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
