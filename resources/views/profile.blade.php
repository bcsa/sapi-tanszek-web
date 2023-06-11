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
                                    disabled
                                    dense
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
                                    dense
                                    solo
                                    placeholder="{{ $user->pozicio ?? 'tanár' }}"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="8" class="py-0">
                                <v-label>
                                    Avatar
                                </v-label>
                                <v-img
                                    class="my-3"
                                    max-height="300"
                                    max-width="300"
                                    :src="getTanarAvatar({{ $user }})"
                                ></v-img>
                                <input
                                    class="form-control my-3"
                                    ref="avatarinput"
                                    accept="image/*"
                                    type="file"
                                    @change="onFileSelect"
                                />
                            </v-col>

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
                pozicio: null,
                avatar: null,
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

            mounted() {
                this.name = {!! json_encode($user->name) !!}
                this.email = {!! json_encode($user->email) !!}
                this.pozicio = {!! json_encode($user->pozicio) !!}
            },

            methods: {
                getTanarAvatar(tanar) {
                    if (tanar.avatar) {
                        return "{{ asset('storage/avatars/') . '/' }}" + tanar.avatar
                    } else {
                        return "{{ asset('storage/avatars/defpic.jpg') }}"
                    }
                },

                onFileSelect() {
                    this.avatar = this.$refs.avatarinput.files[0]
                },

                submitUserUpdate() {
                    if (!this.$refs.updateForm.validate()) {
                        return
                    }

                    let formData = new FormData()

                    if (this.name) {
                        formData.append('name', this.name)
                    }

                    if (this.pozicio) {
                        formData.append('pozicio', this.pozicio)
                    }

                    if (this.avatar) {
                        formData.append('avatar', this.avatar)
                    }

                    this.errorMessage = null
                    if (!this.isBusy) {
                        this.isBusy = true

                        axios.post(route('submit-profile'), formData).then((response) => {
                            this.isBusy = false
                            this.isSent = true
                        }).catch((error) => {
                            if (error) {
                                if (_.get(error.response.data.errors, 'avatar')) {
                                    this.errorMessage = error.response.data.errors.avatar[0]
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
