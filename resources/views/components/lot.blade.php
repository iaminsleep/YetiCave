<li class="lots__item lot @if(Carbon\Carbon::now()->gte($lot->end_date)) {{ 'item--end' }} @endif">
    <div class="lot__image">
        <img src="/{{ $lot->url }}" alt="Сноуборд">
    </div>
    <div class="lot__info">
        <span class="lot__category">{{ $lot->category->title }}</span>
        <h3 class="lot__title"><a class="text-link" href="{{route('lot-page', ['id' => $lot->id])}}">{{ $lot->title }}</a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost">{{ $lot->price}}<b class="rub">р</b></span>
            </div>
            <div class="lot__timer timer">
                @if(Carbon\Carbon::now()->gte($lot->end_date)) {{ 'Завершён' }} 
                @else {{ Carbon\Carbon::parse($lot->end_date)->diff(Carbon\Carbon::parse(date('Y-m-d H:i:s')))->format('%d:%H:%i:%s') }}
                @endif
            </div>
        </div>
    </div>
</li>
