@extends('layouts.main')
@section('content')
    <section class="catalog">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['name'] }}</td>
                            <td>{{ $order['amount'] }}</td>
                            <td>{{ $order['total'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
