@extends('layouts.main')
@section('content')
    <section class="reg">
        <div class="container">
            <h2>Регистрация</h2>
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{ route('user.register') }}" method="POST" class="wrapper__reg-form">
                @csrf
                @method('post')
                <div>
                    <label for="name">Логин:</label>
                    <input id="name" type="text" name="name" required>
                </div>
                <div>
                    <label for="email">Почта:</label>
                    <input id="email" type="email" name="email" required>
                </div>
                <div>
                    <label for="password">Пароль:</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div>
                    <label for="confirm_password">Подтверждение пароля:</label>
                    <input id="confirm_password" type="password" name="confirm_password" required>
                </div>
                <input type="submit" value="Зарегистрироваться">
            </form>
        </div>
    </section>
@endsection
