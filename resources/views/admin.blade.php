@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <v-form ref="updateForm" lazy-validation @submit.prevent="submitUserUpdate">
                        @csrf

                        <div class="row mx-auto justify-content-center">
                            <v-col cols="8" class="py-0">
                                <v-label>
                                    Név*
                                </v-label>
                                <v-text-field
                                    v-model="name"
                                    solo
                                    placeholder="{{ $user->name }}"
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
                                    solo
                                    placeholder="{{ $user->email }}"
                                    :rules="emailRules"
                                    required
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8" class="py-0">
                                <v-label>
                                    Pozíció
                                </v-label>
                                <v-text-field
                                    v-model="pozicio"
                                    solo
                                    placeholder="{{ $user->pozicio ?? 'tanár' }}"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8" class="py-0">
                                <v-label>
                                    Leírás
                                </v-label>
                                <v-text-field
                                    v-model="leiras"
                                    solo
                                    placeholder="{{ $user->leiras ?? 'leírás' }}"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8" class="py-0">
                                <v-label>
                                    Avatar
                                </v-label>
                                <v-text-field
                                    v-model="avatar"
                                    solo
                                    placeholder="{{ $user->avatar ?? 'avatar' }}"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8">
                                <v-btn
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
                leiras: null,
                pozicio: null,
                avatar: null,
                message: null,
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

                        axios.post(route('adminsubmit'), {
                            name: this.name,
                            email: this.email,
                            pozicio: this.pozicio,
                            leiras: this.leiras,
                        }).then((response) => {
                            this.isBusy = false
                            this.isSent = true
                        }).catch((error) => {
                            if (error) {
                                if (_.get(error.response.data.errors, 'message')) {
                                    this.errorMessage = error.response.data.errors.message[0]
                                }

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
