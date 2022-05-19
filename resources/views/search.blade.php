@extends('layout')

@section('title', 'Поиск лотов')

@section('page-content')
    <x-nav></x-nav>
    <div class="container">
        @if($lots->isNotEmpty())
            <section class="lots">
                @isset($category)
                    <h2>Все лоты в категории <span>«{{$category}}»</span></h2>
                @endisset
                @isset($search)
                    <h2>Все лоты в категории <span>«{{$search}}»</span></h2>
                @endisset
                <ul class="lots__list">
                    @foreach($lots as $lot)
                        <x-lot :lot="$lot"></x-lot>
                    @endforeach
                </ul>
            </section>
            {{ $lots->links() }}
        @else
            <section class="lots">
                @isset($category)
                    <h2>В категории <span>«{{$category}}»</span> лотов не нашлось...</h2>
                @endisset
                @isset($search)
                    <h2>Результатов поиска по запросу <span>«{{$search}}»</span> нет</h2>
                @endisset
            </section>
        @endif
    </div>
@endsection
