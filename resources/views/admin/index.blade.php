@extends('layouts.main')
@section('content')
    <section class="admin">
        <div class="container">
            <h2>Админская панель</h2>
            <h3>Все заказы</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Дата создания</th>
                    <th>E-mail</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->products->first()->name }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>
                            <div class="flex">
                                <form action="{{ route('order.status', $order->id) }}">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status_method" value="-1">
                                    <button type="submit"><</button>
                                </form>
                                {{ $order->status }}
                                <form action="{{ route('order.status', $order->id) }}">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status_method" value="1">
                                    <button type="submit">></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
