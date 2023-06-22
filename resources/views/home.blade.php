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

                <vue-scroll class="card-body mt-10">
                    <v-col class="py-0">
                        <v-row
                            v-for="rendezveny in rendezvenyek"
                            :key="rendezveny.id"
                            class="rendezveny-wrapper"
                            @click="redirectToShow(rendezveny.id)"
                        >
                            <v-col cols="3" md="1" class="details text-center align-self-center">
                                <div class="datum nap text-no-wrap">
                                    @{{ rendezveny.nap }}
                                </div>

                                <div class="datum honap text-no-wrap">
                                    @{{ rendezveny.honap }}
                                </div>

                                <div class="datum ev text-no-wrap">
                                    @{{ rendezveny.ev }}
                                </div>
                            </v-col>

                            <v-col cols="3" class="text-center lightgreen hide-on-mobile">
                                <img v-if="rendezveny.kepek" :src="'{{ asset('storage/kepek') }}/' + rendezveny.kepek[0]" width="150" height="auto" alt="">
                                <img v-else src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" width="200" height="auto" alt="">
                            </v-col>

                            <v-col cols="6" class="lightgreen">
                                <h2>@{{ rendezveny.nev }}</h2>
                                <h5>@{{ rendezveny.leiras.substring(0,50)+"..." }}</h5>
                                <h5 v-if="rendezveny.resztvevok" class="mt-10">Létszám: @{{ rendezveny.resztvevok }}</h5>
                            </v-col>

                            <v-col cols="3" md="2" class="details helyszin align-self-center">
                                @{{ rendezveny.helyszin }}
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col class="text-center" cols="12">
                        <v-progress-circular
                            v-show="isLoadingMore"
                            :size="23"
                            :width="3"
                            class="mr-3"
                            color="primary"
                            indeterminate
                        ></v-progress-circular>
                        <v-btn
                            v-show="!isLoadingMore && hasMoreEvents"
                            rounded
                            text
                            @click="search(true)"
                        >
                            További találatok
                        </v-btn>
                    </v-col>
                </vue-scroll>

                <div v-if="false" class="card-body mt-10">
                    <v-row
                        v-for="rendezveny in rendezvenyek"
                        :key="rendezveny.id"
                        class="rendezveny-wrapper"
                        @click="redirectToShow(rendezveny.id)"
                    >
                        <v-col cols="3" md="1" class="details text-center align-self-center">
                            <div class="datum nap text-no-wrap">
                                @{{ rendezveny.nap }}
                            </div>

                            <div class="datum honap text-no-wrap">
                                @{{ rendezveny.honap }}
                            </div>

                            <div class="datum ev text-no-wrap">
                                @{{ rendezveny.ev }}
                            </div>
                        </v-col>

                        <v-col cols="3" class="text-center lightgreen hide-on-mobile">
                            <img v-if="rendezveny.kepek" :src="'{{ asset('storage/kepek') }}/' + rendezveny.kepek[0]" width="150" height="auto" alt="">
                            <img v-else src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" width="200" height="auto" alt="">
                        </v-col>

                        <v-col cols="6" class="lightgreen">
                            <h2>@{{ rendezveny.nev }}</h2>
                            <h5>@{{ rendezveny.leiras.substring(0,50)+"..." }}</h5>
                            <h5 v-if="rendezveny.resztvevok" class="mt-10">Létszám: @{{ rendezveny.resztvevok }}</h5>
                        </v-col>

                        <v-col cols="3" md="2" class="details helyszin align-self-center">
                            @{{ rendezveny.helyszin }}
                        </v-col>
                    </v-row>

{{--                    @if (count($rendezvenyek))--}}
{{--                        {{ count($rendezvenyek) }} találat.--}}
{{--                    @endif--}}

{{--                    <div class="float-right">--}}
{{--                        {!! $rendezvenyek->links() !!}--}}
{{--                    </div>--}}
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
                orderBy: 'idopont',
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

                isLoadingMore: false,
                hasMoreEvents: true,
                getEventsUrl: null,

                params: {},
            },

            mounted() {
                this.search()

                this.$watch('searchTerm', _.debounce(function() {
                    this.search()
                }, 500))

                this.getEventsUrl = route('rendezvenyek.search', this.params)
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
                // handleScroll: _.debounce(function(vertical, horizontal, nativeEvent) {
                //     if (!this.isLoadingMore && vertical.process >= 0.95 && this.hasMoreEvents) {
                //         this.search(true)
                //     }
                // }, 300),

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

                search(isFromScroll = false) {
                    this.isLoadingMore = true

                    if (this.orderBy) {
                        this.params.order_by = this.orderBy
                    }

                    if (this.selectedYear) {
                        this.params.years = this.selectedYear
                    }

                    if (this.selectedCategory) {
                        this.params.categories = this.selectedCategory
                    }

                    if (this.searchTerm) {
                        this.params.search_term = this.searchTerm
                    }

                    if (!isFromScroll) {
                        this.rendezvenyek = []
                        this.getEventsUrl = route('rendezvenyek.search', this.params)
                    }

                    axios.post(this.getEventsUrl).then((response) => {
                        if (response && response.data) {
                            this.rendezvenyek.push(...response.data.data)
                            this.getEventsUrl = response.data.next_page_url
                            this.hasMoreEvents = !!response.data.next_page_url
                            // console.log(response.data)
                        }
                        this.isLoadingMore = false
                    }).catch((e) => {
                        this.isLoadingMore = false
                    })
                },
            },
        }

        window.mixins.push(homeMixin)
    </script>
@endpush
