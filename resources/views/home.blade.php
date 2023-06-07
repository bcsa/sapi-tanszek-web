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

                <v-row>
                    <v-col cols="4" class="ml-5 mt-5">
                        <v-form @submit.prevent class="mb-10">
                            <v-text-field
                                v-model="searchTerm"
                                hide-details
                                label="Keresés"
                                outlined
                                dense
                                single-line
                                append-icon="fas fa-times"
                                @click:append="searchTerm = null"
{{--                                @keydown.enter="search()"--}}
                            ></v-text-field>
                        </v-form>

{{--                        <form>--}}
{{--                            <input--}}
{{--                                type="search"--}}
{{--                                class="form-control"--}}
{{--                                placeholder="Keresés"--}}
{{--                                name="s"--}}
{{--                                value="{{ request('s') }}"--}}
{{--                            >--}}
{{--                        </form>--}}
                    </v-col>
                </v-row>

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
                            <v-col cols="1" class="details text-center align-self-center">
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

                            <v-col cols="3" class="text-center">
                                @if ($rendezveny->kepek)
                                    <img src="{{ asset('storage/kepek/' . $rendezveny->kepek[0]) }}" width="150" height="auto" alt="">
                                @else
                                    <img src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" width="200" height="auto" alt="">
                                @endif
                            </v-col>

                            <v-col cols="6">
                                <h2>{{ $rendezveny->nev }}</h2>
                                <h5>{{ Str::limit($rendezveny->leiras, 200) }}</h5>
                                @if ($rendezveny->resztvevok)
                                    <h5 class="mt-10">Létszám: {{ $rendezveny->resztvevok }}</h5>
                                @endif
                            </v-col>

                            <v-col cols="2" class="details helyszin align-self-center">
                                {{ $rendezveny->helyszin }}
                            </v-col>
                        </v-row>
                    @empty
                        Nincs találat.
                    @endforelse

                    @if (count($rendezvenyek))
                        {{ count($rendezvenyek) }} találat.
                    @endif

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
                selectedFilter: null,
                orderBy: null,
                rendezvenyek: [],
            },

            mounted() {
                this.$watch('searchTerm', _.debounce(function(value) {
                    this.search(value)
                }, 500))
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
                    let params = {
                        // 'test': 123
                    }

                    if (this.orderBy) {
                        params.order_by = this.orderBy
                    }

                    if (this.selectedFilter) {
                        params.filter_by = this.selectedFilter
                    }

                    if (this.searchTerm) {
                        params.search_term = this.searchTerm
                    }

                    axios.post(route('rendezvenyek.search', params.search_term)).then((response) => {
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
