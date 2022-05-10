
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
                <p class="lot-item__category">Категория: <span>{{ $lot->category->title }}</span></p>
                <p class="lot-item__description">{{ $lot->description }}</p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        {{ Carbon\Carbon::parse($lot->end_date)->diff(Carbon\Carbon::parse(date('Y-m-d H:i:s')))->format('%d:%H:%i:%s') }}
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount cost-red">Начальная цена</span>
                            <span class="lot-item__cost cost-red">{{ $lot->price }}<b class="rub">р</b></span>
                            <span class="lot-item__amount cost-green">Текущая цена</span>
                            <span class="lot-item__cost author_below cost-green">{{App\Models\Bet::where('lot_id', $lot->id)->orderBy('bet_price', 'desc')->first()->bet_price}}<b class="rub">р</b></span>
                            <p class="lot-item__author">Автор: {{ $lot->author->name }} @if(Auth::user() && $lot->author->id === Auth::user()->id) (Вы) @endif</p>
                            <p class="lot-item__author">Связь: +{{ $lot->author->contacts}} </p>
                            
                        </div>
                    </div>
                    @if(Auth::user() && $lot->author_id !== Auth::user()->id)
                        <form class="lot-item__form" action="@if(Auth::user()) {{ route('lot-place-bet', $lot->id) }} @endif" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <p class="lot-item__form-item form__item @if($errors->any()) {{ 'form__item--invalid' }} @endif">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" name="bet_price" placeholder="{{ $lot->price + $lot->bet_step }} руб."value="{{ old('bet_price') }}">
                                @error('bet_price') 
                                    <span class="form__error">Введите корректную сумму</span> 
                                @enderror
                            </p>
                            <button type="submit" class="button @error('bet_price'){{ 'lot-item__min-cost' }}@enderror">Сделать ставку</button>
                        </form>
                        <div class="lot-item__min-cost">
                            (Мин. ставка: <b>{{ $lot->price + $lot->bet_step }} руб.</b>)
                        </div>
                    @endif
                </div>
                <div class="history">
                    <h3>История ставок (<span>{{ $lot->bets->count() }}</span>)</h3>
                    <table class="history__list">
                        @foreach($lot->bets->sortByDesc('bet_date') as $bet)
                            <x-bet :bet="$bet"></x-bet>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
