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

                    <form method="POST" action="{{ route('adminsubmit') }}">
                        @csrf

                        <div class="row mx-auto justify-content-center">
                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label class="required-field" for="nev">Név</label>
                                    <input type="text" class="form-control" name="nev" placeholder="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="pozicio">Pozíció</label>
                                    <input type="text" class="form-control" name="pozicio" placeholder="{{ $user->pozicio ?? 'tanár' }}">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="leiras">Leírás</label>
                                    <input type="text" class="form-control" name="leiras" placeholder="{{ $user->leiras ?? 'leírás' }}">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="text" class="form-control" name="avatar" placeholder="{{ $user->avatar ?? 'avatar' }}">
                                </div>
                            </div>

                            <div class="col-8 mb-3">
                                <button type="submit" class="btn btn-primary">Küldés</button>
                            </div>
                        </div>
                    </form>

{{--                    <v-row>--}}
{{--                        <v-col cols="12" md="8" offset-md="4" class="my-auto contact-wrapper">--}}
{{--                            <form @submit.prevent="submitContact()">--}}
{{--                                <v-label>Department*</v-label>--}}
{{--                                <v-select--}}
{{--                                    v-model="selectedDepartment"--}}
{{--                                    :items="departmentList"--}}
{{--                                    dark--}}
{{--                                    flat--}}
{{--                                    outlined--}}
{{--                                    solo--}}
{{--                                    single-line--}}
{{--                                    hide-details--}}
{{--                                >--}}
{{--                                </v-select>--}}
{{--                                <v-label>Name*</v-label>--}}
{{--                                <v-text-field--}}
{{--                                    required--}}
{{--                                    data-hj-allow--}}
{{--                                    class="data-hj-allow"--}}
{{--                                    v-model="name"--}}
{{--                                    single-line--}}
{{--                                    hide-details--}}
{{--                                    outlined--}}
{{--                                    placeholder="Example"--}}
{{--                                >--}}
{{--                                </v-text-field>--}}

{{--                                <v-label>E-Mail*</v-label>--}}
{{--                                <v-text-field--}}
{{--                                    data-hj-allow--}}
{{--                                    class="data-hj-allow"--}}
{{--                                    type="email"--}}
{{--                                    v-model="email"--}}
{{--                                    required--}}
{{--                                    single-line--}}
{{--                                    hide-details--}}
{{--                                    outlined--}}
{{--                                    placeholder="example@gmail.com"--}}
{{--                                >--}}
{{--                                </v-text-field>--}}

{{--                                <v-label>Message*</v-label>--}}
{{--                                <v-textarea--}}
{{--                                    data-hj-allow--}}
{{--                                    class="data-hj-allow"--}}
{{--                                    v-model="message"--}}
{{--                                    required--}}
{{--                                    outlined--}}
{{--                                    auto-grow--}}
{{--                                    placeholder="Write your message here"--}}
{{--                                >--}}
{{--                                </v-textarea>--}}

{{--                                <v-btn--}}
{{--                                    class="cta yellow"--}}
{{--                                    type="submit"--}}
{{--                                    :disabled="isBusy"--}}
{{--                                    :loading="isBusy"--}}
{{--                                    depressed--}}
{{--                                >--}}
{{--                                    SEND MESSAGE--}}
{{--                                </v-btn>--}}
{{--                            </form>--}}
{{--                        </v-col>--}}
{{--                    </v-row>--}}
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
                nev: null,
                email: null,
                message: null,
                isBusy: false,
                isSent: false,
                errorMessage: null,
            },

            mounted() {
                console.log('test')
            },

            methods: {
                submitContact() {
                    this.errorMessage = null
                    if (!this.isBusy) {
                        this.isBusy = true

                        axios.post(route('adminsubmit'), {
                            name: this.name,
                            email: this.email,
                            message: this.message,
                            department: this.selectedDepartment
                        }).then((response) => {
                            this.trackClick('Lead', 'ContactForm', {
                                email: this.email
                            })

                            this.name = null
                            this.email = null
                            this.message = null
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
