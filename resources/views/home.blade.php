@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    Rendezvények
                </div>

                <v-form @submit.prevent>
                    <v-row class="mx-3">
                        <v-col cols="12" md="3">
                            <v-text-field
                                v-model="searchTerm"
                                hide-details
                                label="Keresés..."
                                dense
                                solo
                                append-icon="fas fa-times"
                                @click:append="searchTerm = null"
{{--                                @keydown.enter="search()"--}}
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="3">
                            <v-select
                                v-model="selectedYear"
                                hide-details
                                :items="years"
                                multiple
                                dense
                                solo
                                placeholder="Év"
                            ></v-select>
                        </v-col>

                        <v-col cols="12" md="3">
                            <v-select
                                v-model="selectedCategory"
                                hide-details
                                :items="categories"
                                item-text="name"
                                item-value="value"
                                multiple
                                dense
                                solo
                                placeholder="Kategória"
                            ></v-select>
                        </v-col>

                        <v-col cols="12" md="3">
                            <v-select
                                v-model="orderBy"
                                hide-details
                                :items="order"
                                item-text="name"
                                item-value="value"
                                dense
                                solo
                                placeholder="Rendezés"
                            ></v-select>
                        </v-col>
                    </v-row>
                </v-form>

                <div class="card-body">
                    <v-list dense>
                        <v-list-item
                            v-for="rendezveny in rendezvenyek"
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
                        </v-list-item>
                    </v-list>
                </div>

                <div class="card-body">
                    @forelse ($rendezvenyek as $rendezveny)
                        <v-row class="rendezveny-wrapper" @click="redirectToShow({{ $rendezveny->id }})">
                            <v-col cols="3" md="1" class="details text-center align-self-center">
                                <div class="datum nap text-no-wrap">
                                    {{ $rendezveny->nap }}
                                </div>

                                <div class="datum honap text-no-wrap">
                                    {{ $rendezveny->honap }}
                                </div>

                                <div class="datum ev text-no-wrap">
                                    {{ $rendezveny->ev }}
                                </div>
                            </v-col>

                            <v-col cols="3" class="text-center lightgreen hidden-sm-and-down">
                                @if ($rendezveny->kepek)
                                    <img src="{{ asset('storage/kepek/' . $rendezveny->kepek[0]) }}" width="150" height="auto" alt="">
                                @else
                                    <img src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" width="200" height="auto" alt="">
                                @endif
                            </v-col>

                            <v-col cols="6" class="lightgreen">
                                <h2>{{ $rendezveny->nev }}</h2>
                                <h5>{{ Str::limit($rendezveny->leiras, 50) }}</h5>
                                @if ($rendezveny->resztvevok)
                                    <h5 class="mt-10">Létszám: {{ $rendezveny->resztvevok }}</h5>
                                @endif
                            </v-col>

                            <v-col cols="3" md="2" class="details helyszin align-self-center">
                                {{ $rendezveny->helyszin }}
                            </v-col>
                        </v-row>
                    @empty
                        Nincs találat.
                    @endforelse

{{--                    @if (count($rendezvenyek))--}}
{{--                        {{ count($rendezvenyek) }} találat.--}}
{{--                    @endif--}}

                    <div class="float-right">
                        {!! $rendezvenyek->links() !!}
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
                searchTerm: null,
                orderBy: null,
                rendezvenyek: [],
                years: ['2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023'],
                selectedYear: null,
                categories: [{
                    name: 'Tábor',
                    value: 'tábor'
                }, {
                    name: 'TDK',
                    value: 'TDK'
                }, {
                    name: 'Verseny',
                    value: 'verseny'
                }, {
                    name: 'Konferencia',
                    value: 'konferencia'
                }, {
                    name: 'Workshop',
                    value: 'workshop'
                }],
                order: [{
                    name: 'Időpont',
                    value: 'idopont'
                }, {
                    name: 'Név',
                    value: 'nev'
                }],
                selectedCategory: null,
            },

            mounted() {
                this.$watch('searchTerm', _.debounce(function() {
                    this.search()
                }, 500))
            },

            watch: {
                selectedYear() {
                    this.search()
                },

                selectedCategory() {
                    this.search()
                },

                orderBy() {
                    this.search()
                }
            },

            methods: {
                redirectToShow(id) {
                    window.location.href = route('rendezvenyek.show', id)
                },

                getRendezvenyAvatar(rendezveny) {
                    if (rendezveny.kepek) {
                        return "{{ asset('storage/kepek/') . '/' }}" + rendezveny.kepek[0]
                    } else {
                        return "{{ asset('storage/avatars/defpic.jpg') }}"
                    }
                },

                search() {
                    let params = {}

                    if (this.orderBy) {
                        params.order_by = this.orderBy
                    }

                    if (this.selectedYear) {
                        params.years = this.selectedYear
                    }

                    if (this.selectedCategory) {
                        params.categories = this.selectedCategory
                    }

                    if (this.searchTerm) {
                        params.search_term = this.searchTerm
                    }

                    axios.post(route('rendezvenyek.search', params)).then((response) => {
                        if (response && response.data) {
                            this.rendezvenyek = response.data.data
                            // console.log(response.data.data)
                        }
                    })
                },
            },
        }

        window.mixins.push(homeMixin)
    </script>
@endpush
