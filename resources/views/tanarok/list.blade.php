@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Tanárok
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
                                name="s"
                                value="{{ request('s') }}"
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

                    @forelse ($tanarok as $tanar)
                        <v-row class="tanar-wrapper" @click="redirectToShow({{ $tanar->id }})">
                            <v-col cols="3" class="text-center">
                                @if ($tanar->avatar)
                                    <img src="{{ asset('storage/avatars/' . $tanar->avatar) }}" width="150" height="auto" alt="">
                                @else
                                    <img src="{{ asset('storage/avatars/defpic.jpg') }}" width="150" height="auto" alt="">
                                @endif
                            </v-col>

                            <v-col cols="7">
                                <h2>{{ $tanar->nev }}</h2>
                                <h5>{{ $tanar->email }}</h5>
                            </v-col>

                            <v-col cols="2" class="details pozicio align-self-center">
                                {{ $tanar->pozicio }}
                            </v-col>
                        </v-row>
                    @empty
                        Nincs találat.
                    @endforelse

                    @if (count($tanarok))
                        {{ count($tanarok) }} találat.
                    @endif

                    <div class="float-right">
                        {!! $tanarok->links() !!}
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
            },

            // watch: {
            //     searchTerm: function(value) {
            //         console.log(value)
            //     }
            // },

            methods: {
                redirectToShow(id) {
                    window.location.href = route('tanarok.show', id)
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

                    axios.post('/tanarok/search', params).then((response) => {
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
