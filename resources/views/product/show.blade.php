@extends('layouts.main')
@section('content')
    <section class="product">
        <div class="container">
            <div class="wrapper__product">
                <div class="image-wrapper__product"></div>
                <div class="content__product">
                    <h2>{{ $product['name'] }}</h2>
                    <span>Цена: {{ $product['cost'] }}</span>
                    <span>Количество: {{ $product['amount'] }}</span>
                    <p>Описание: {{ $product['description'] }}</p>
                    <form action="{{ route('product.buy', $product->id) }}" method="post" class="buy-block">
                        @csrf
                        @method('patch')
                        <div class="wrapper__product-amount">
                            <label for="product-amount">Количество:</label>
                            <input id="product-amount" name="amount" class="product-amount" type="number" min="1"
                                   max="{{ $product['amount'] }}" value="1">
                        </div>
                        <button type="submit" class="btn buy-btn" @if($product['amount'] <= 0) disabled @endif>Купить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
