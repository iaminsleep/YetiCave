
@extends('layout')

@section('title', 'Страница лота')

@section('scripts')
    <script src="../../public/js/single-lot.js"></script>
@endsection

@section('page-content')
    <x-nav></x-nav>
    <section class="lot-item container @if(Carbon\Carbon::now()->gte($lot->end_date)) {{ 'item--end' }} @endif">
        <h2>{{$lot->title}}</h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="/{{$lot->url}}" alt="{{ $lot->title }}">
                </div>
                <p class="lot-item__category">Категория: <span>{{ $lot->category->title }}</span></p>
                <p class="lot-item__description">{{ $lot->description }}</p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer single-lot-timer">
                        @if(Carbon\Carbon::now()->gte($lot->end_date)) {{ '00:00:00:00' }}
                        @else{{ Carbon\Carbon::parse($lot->end_date)->diff(Carbon\Carbon::parse(date('Y-m-d H:i:s')))->format('%d дней, %H часов, %i минут и %s секунд') }}
                        @endif
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount @if(!Carbon\Carbon::now()->gte($lot->end_date) && $lot->bets->count() > 0) {{ 'cost-red' }} @endif">Начальная цена:</span>
                            <span class="lot-item__cost @if(!$lot->bets->count() > 0) {{ 'author_below' }} @elseif(!Carbon\Carbon::now()->gte($lot->end_date) && $lot->bets->count() > 0) {{ 'cost-red' }} @endif">{{ $lot->price }}<b class="rub">р</b></span>
                            @if($lot->bets->count() > 0)
                                <span class="lot-item__amount @if(!Carbon\Carbon::now()->gte($lot->end_date)) {{ 'cost-green' }} @endif">
                                    @if(Carbon\Carbon::now()->gte($lot->end_date)) {{ 'Продано за:' }}
                                    @else {{ 'Текущая цена:' }} @endif
                                </span>
                                <span class="lot-item__cost author_below @if(!Carbon\Carbon::now()->gte($lot->end_date)) {{ 'cost-green' }} @endif">{{ App\Models\Bet::where('lot_id', $lot->id)->orderBy('bet_price', 'desc')->first()->bet_price }}<b class="rub">р</b>
                                </span>
                            @endif
                            <p>Шаг ставки: {{ $lot->bet_step }}р.</p>
                            @if(!Carbon\Carbon::now()->gte($lot->end_date))
                                <p class="lot-item__author">Автор: {{ $lot->author->name }} @if(Auth::user() && $lot->author->id === Auth::user()->id) (Вы) @endif</p>
                                <p class="lot-item__author">Связь: <a href="tel:+{{ $lot->author->contacts}}">+{{ $lot->author->contacts }}</a></p>
                            @endif
                        </div>
                    </div>
                    @if(Carbon\Carbon::now()->gte($lot->end_date)) 
                        <p class="cost-red">Аукцион завершён.</p>
                        @if($lot->winner_id)
                            @if(Auth::user() && $lot->winner_id === Auth::user()->id)
                                <p class="winner">Вы победили! Ожидайте звонка от автора аукциона.</p>
                            @else
                                <p class="winner">Победитель: {{ App\Models\User::where('id', $lot->winner_id)->first()->name }}</p>
                            @endif
                        @endif
                    @elseif(Auth::user() && $lot->author_id !== Auth::user()->id)
                        <form class="lot-item__form" action="@if(Auth::user()) {{ route('lot-place-bet', $lot->id) }} @endif" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <p class="lot-item__form-item form__item @if($errors->any()) {{ 'form__item--invalid' }} @endif">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" name="bet_price" placeholder="@if($lot->bets->count() > 0){{ App\Models\Bet::where('lot_id', $lot->id)->orderBy('bet_price', 'desc')->first()->bet_price + $lot->bet_step }}@else{{ $lot->price + $lot->bet_step }}@endif руб." value="{{ old('bet_price') }}">
                                @error('bet_price') 
                                    <span class="form__error">Введите корректную сумму</span> 
                                @enderror
                            </p>
                            <button type="submit" class="button @error('bet_price'){{ 'lot-item__min-cost' }}@enderror">Сделать ставку</button>
                        </form>
                        <div class="lot-item__min-cost">
                            (Мин. ставка: <b>@if($lot->bets->count() > 0) {{ App\Models\Bet::where('lot_id', $lot->id)->orderBy('bet_price', 'desc')->first()->bet_price + $lot->bet_step }} @else {{ $lot->price + $lot->bet_step }} @endif руб.</b> - сумма текущей макс. цены + шаг ставки)
                        </div>
                    @elseif(Auth::user() && $lot->author_id === Auth::user()->id)
                        <form class="lot-item__form" action="@if(Auth::user() && $lot->author_id === Auth::user()->id) {{ route('lot-end', $lot->id) }} @endif" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="button end-auction-btn">Завершить аукцион</button>
                        </form>
                    @endif
                </div>
                <div class="history">
                    @if($lot->bets->count() > 0)
                        <h3>История ставок (<span>{{ $lot->bets->count() }}</span>)</h3>
                    @elseif(!$lot->bets->count() > 0 && Carbon\Carbon::now()->gte($lot->end_date))
                        <p>По окончанию аукциона ставки не производились.</p>
                    @else
                        <p>На данный момент ставок нет.</p>
                    @endif
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
