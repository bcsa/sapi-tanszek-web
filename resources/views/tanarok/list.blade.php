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
                    Tanárok
                </div>

                <v-row>
                    <v-col cols="11" class="mx-auto">
                        <v-form @submit.prevent class="mb-10">
                            <v-text-field
                                v-model="searchTerm"
                                hide-details
                                label="Keresés"
                                outlined
                                dense
                                single-line
{{--                                append-icon="fas fa-times"--}}
{{--                                @click:append="searchTerm = null"--}}
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
                            v-for="tanar in tanarok"
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
                </div>

                <div class="card-body">
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
                                <h2>{{ $tanar->name }}</h2>
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
                tanarok: [],
            },

            mounted() {
                this.$watch('searchTerm', _.debounce(function(value) {
                    this.search(value)
                }, 500))
            },

            methods: {
                redirectToShow(id) {
                    window.location.href = route('tanarok.show', id)
                },

                getTanarAvatar(tanar) {
                    if (tanar.avatar) {
                        return "{{ asset('storage/avatars/') . '/' }}" + tanar.avatar
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

                    axios.post(route('tanarok.search', params.search_term)).then((response) => {
                        if (response && response.data) {
                            this.tanarok = response.data.data
                            // console.log(response.data.data)
                        }
                    })
                }
            },
        }

        window.mixins.push(homeMixin)
    </script>
@endpush
