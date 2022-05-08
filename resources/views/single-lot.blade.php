
@extends('layout')

@section('title', 'Страница лота')

@section('page-content')
    <x-nav></x-nav>
    <section class="lot-item container">
        <h2>{{$lot->title}}</h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="/{{$lot->url}}" width="730" height="548" alt="{{ $lot->title }}">
                </div>
                <p class="lot-item__category">Категория: <span>{{$lot->category->title}}</span></p>
                <p class="lot-item__description">{{$lot->description}}</p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        {{ $timer }}
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost">{{$lot->price}}<b class="rub">р</b></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span>{{$lot->price + $lot->bet_step}}<b class="rub">р</b></span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post" autocomplete="off">
                        <p class="lot-item__form-item form__item form__item--invalid">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="text" name="cost" placeholder="{{$lot->price + $lot->bet_step}}">
                            <span class="form__error">Введите наименование лота</span>
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <div class="history">
                    <h3>История ставок (<span>{{ $lot->bets->count() }}</span>)</h3>
                    <table class="history__list">
                        @foreach($lot->bets as $bet)
                            <x-bet :bet="$bet"></x-bet>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
