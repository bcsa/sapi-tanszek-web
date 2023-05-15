@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $tanar->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <v-alert v-if="errorMessage" type="error">
                        @{{ errorMessage }}
                    </v-alert>

                    <v-alert v-if="isSent" type="success">
                        Profil frissítve!
                    </v-alert>

                    <v-form v-else ref="updateForm" lazy-validation @submit.prevent="submitUserUpdate">
                        @csrf

                        <div class="row mx-auto justify-content-center">
                            <v-col cols="8" class="py-0">
                                <v-label>
                                    Név*
                                </v-label>
                                <v-text-field
                                    v-model="name"
                                    dense
                                    solo
                                    placeholder="{{ $tanar->name }}"
                                    :rules="nameRules"
                                    required
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8" class="py-0">
                                <v-label>
                                    Email*
                                </v-label>
                                <v-text-field
                                    v-model="email"
                                    dense
                                    solo
                                    placeholder="{{ $tanar->email }}"
                                    :rules="emailRules"
                                    required
                                ></v-text-field>
                            </v-col>

{{--                            <v-col cols="8" class="py-0">--}}
{{--                                <v-label>--}}
{{--                                    Pozíció--}}
{{--                                </v-label>--}}
{{--                                <v-text-field--}}
{{--                                    v-model="pozicio"--}}
{{--                                    dense--}}
{{--                                    solo--}}
{{--                                    placeholder="{{ $tanar->pozicio ?? 'tanár' }}"--}}
{{--                                ></v-text-field>--}}
{{--                            </v-col>--}}

{{--                            <v-col cols="8" class="py-0">--}}
{{--                                <v-label>--}}
{{--                                    Leírás--}}
{{--                                </v-label>--}}
{{--                                <v-text-field--}}
{{--                                    v-model="leiras"--}}
{{--                                    dense--}}
{{--                                    solo--}}
{{--                                    placeholder="{{ $tanar->leiras ?? 'leírás' }}"--}}
{{--                                ></v-text-field>--}}
{{--                            </v-col>--}}

{{--                            <v-col cols="8" class="py-0">--}}
{{--                                <v-label>--}}
{{--                                    Avatar--}}
{{--                                </v-label>--}}
{{--                                <v-text-field--}}
{{--                                    v-model="avatar"--}}
{{--                                    dense--}}
{{--                                    solo--}}
{{--                                    placeholder="{{ $tanar->avatar ?? 'avatar' }}"--}}
{{--                                ></v-text-field>--}}
{{--                            </v-col>--}}

                            <v-col cols="8">
                                <v-btn
                                    small
                                    type="submit"
                                    :disabled="isBusy"
                                    :loading="isBusy"
                                    depressed
                                >
                                    Küldés
                                </v-btn>
                            </v-col>
                        </div>
                    </v-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">
        let mixin = {

            data: {
                name: null,
                email: null,
                // leiras: null,
                // pozicio: null,
                // avatar: null,
                isBusy: false,
                isSent: false,
                errorMessage: null,

                nameRules: [
                    v => !!v || 'Név kötelező',
                    v => (v && v.length >= 3) || 'Minimum 3 karakter',
                ],

                emailRules: [
                    v => !!v || 'Email kötelező',
                    v => /.+@.+\..+/.test(v) || 'Email érvényes kell legyen',
                ],
            },

            methods: {
                submitUserUpdate() {
                    if (!this.$refs.updateForm.validate()) {
                        return
                    }

                    this.errorMessage = null
                    if (!this.isBusy) {
                        this.isBusy = true

                        axios.post(route('submit-profile'), {
                            name: this.name,
                            email: this.email,
                            // pozicio: this.pozicio,
                            // leiras: this.leiras,
                        }).then((response) => {
                            this.$refs.updateForm.reset()
                            this.isBusy = false
                            this.isSent = true
                        }).catch((error) => {
                            if (error) {
                                if (_.get(error.response.data.errors, 'email')) {
                                    this.errorMessage = error.response.data.errors.email[0]
                                }
                            }

                            this.isBusy = false
                        })
                    }
                },
            }
        }

        window.mixins.push(mixin)
    </script>
@endpush
