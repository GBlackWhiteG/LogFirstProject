@extends('layouts.main')
@section('content')
    <section class="reg">
        <div class="container">
            <h2>Вход</h2>
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{ route('user.auth') }}" method="POST" class="wrapper__reg-form">
                @csrf
                @method('post')
                <div>
                    <label for="email">Почта:</label>
                    <input id="email" type="email" name="email" required>
                </div>
                <div>
                    <label for="password">Пароль:</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <input type="submit" value="Войти">
            </form>
        </div>
    </section>
@endsection
