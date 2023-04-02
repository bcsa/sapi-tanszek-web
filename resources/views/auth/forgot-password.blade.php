@extends('layouts.auth', [
  'title' => 'Forgot your password?',
  'titleCtas' => [
    'No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.',
  ],
  'contentTitle' => 'RESET PASSWORD'
])

@section('content')

<form method="POST" action="{{ route('password.email') }}" autocomplete="off">
    @csrf
    <div>
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Enter your email">
    </div>

    <v-btn depressed role="submit" type="submit" class="submit">
      Send Reset Link
    </v-btn>
</form>

@endsection
