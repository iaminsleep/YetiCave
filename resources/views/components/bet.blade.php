<tr class="history__item">
    <td class="history__name">{{ $bet->author->name }}</td>
    <td class="history__price">{{ $bet->bet_price }} руб.</td>
    <td class="history__time">{{ Carbon\Carbon::parse($bet->bet_date)->diffForHumans() }}</td>
    @if(Auth::user() && $bet->author_id === Auth::user()->id && !Carbon\Carbon::now()->gte($bet->lot->end_date))
        <td class="no-width">
            <form action="{{ route('delete-bet', $bet->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="history__delete" type="submit" title="Удалить ставку"/>
            </form>
        </td>
    @endif
</tr>