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
{{--                        <v-form>--}}
{{--                            <v-text-field--}}
{{--                                v-model="searchTerm"--}}
{{--                                hide-details--}}
{{--                                label="Keresés"--}}
{{--                                outlined--}}
{{--                                single-line--}}
{{--                                append-icon="fas fa-times"--}}
{{--                                @click:append="searchTerm = null"--}}
{{--                                @keydown.enter="search()"--}}
{{--                            ></v-text-field>--}}
{{--                        </v-form>--}}

                        <form>
                            <input
                                type="search"
                                class="form-control"
                                placeholder="Keresés"
                                name="search"
                                value="{{ request('search') }}"
                            >
                        </form>
                    </v-col>
                </v-row>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                            </v-col>

                            <v-col cols="2" class="details helyszin align-self-center">
                                {{ $rendezveny->helyszin }}
                            </v-col>
                        </v-row>
                    @empty
                        Üres.
                    @endforelse

                    {!! $rendezvenyek->links() !!}
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
            },

            // watch: {
            //     searchTerm: function(value) {
            //         console.log(value)
            //     }
            // },

            methods: {
                redirectToShow(id) {
                    window.location.href = route('rendezvenyek.show', id)
                },

                search() {
                    let params = {
                        'test': 123
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

                    axios.post('/rendezvenyek/search', params).then((response) => {
                        if (response && response.data) {
                            console.log(response.data)
                        }
                    })
                }
            },
        }

        window.mixins.push(homeMixin)
    </script>
@endpush
