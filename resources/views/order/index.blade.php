@extends('layouts.main')
@section('content')
    <section class="catalog">
        <div class="container">
            <h2>Ваши заказы</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{ $order->products->first()->name }}</td>
                        <td>{{ $order['amount'] }}</td>
                        <td>{{ $order['total'] }}</td>
                        <td>{{ $order['status'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
