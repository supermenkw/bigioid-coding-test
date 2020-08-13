@extends('layouts.auth')

@section('content')
<div class="page-content page-auth mt-5" id="register">
    <div class="section-auth" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-lg-4">
            <h2>
            Be Surveyor
            and contribute.
            </h2>
            <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Full Name</label>
                <input id="name" 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        autocomplete="name"
                        v-model="name"
                        aria-describedby="nameHelp">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input id="email" 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror"
                        :class="{ 'is-invalid' : this.email_unavailable }"
                        name="email" 
                        value="{{ old('email') }}" 
                        v-model="email"
                        @change="checkForEmailAvailability()" 
                        aria-describedby="emailHelp"
                        required 
                        autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input id="password" 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required 
                        autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input id="password-confirm" 
                        type="password" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password">

                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button
                type="submit"
                class="btn btn-success btn-block mt-4"
                :disabled="this.email_unavailable"
            >
                Sign Up Now
            </button>
            <a
                type="submit"
                class="btn btn-signup btn-block mt-2"
                href="{{ route('login') }}"
            >
                Back to Sign In
            </a>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection


@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    Vue.use(Toasted);
    const register = new Vue({
        el: "#register",
        mounted() {
        AOS.init();

        },
        methods: {
            checkForEmailAvailability: function () {
                const self = this;
                axios.get('{{ route('api-register-check') }}', {
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email anda tersedia! Silahkan lanjut langkah selanjutnya!", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = false;
                        } else {
                            self.$toasted.error(
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response.data);
                    })
            }
        }
    });
    </script>
@endpush