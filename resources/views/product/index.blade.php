@extends('layouts.main')
@section('content')
    <section class="catalog">
        <div class="container">
            <ul class="cards-wrapper">
                @foreach($products as $product)
                    <li>
                        <a href="{{ route('product.show', $product->id) }}"
                           class="card @if($product['amount'] <= 0) disabled-card @endif">
                            <div class="image-wrapper__card"></div>
                            <h2>{{ $product['name'] }}</h2>
                            <span>Цена: {{ $product['cost'] }}</span>
                            <span>Количество: {{ $product['amount'] }}</span>
                            <button class="btn" @if($product['amount'] <= 0) disabled @endif>
                                @if( $product['amount'] > 0)
                                    Купить
                                @else
                                    Нет в наличии
                                @endif
                            </button>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
