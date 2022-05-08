<tr class="history__item">
    <td class="history__name">{{ $bet->author->name }}</td>
    <td class="history__price">{{ $bet->bet_price }}<b class="rub">р</b></td>
    <td class="history__time">{{ Carbon\Carbon::parse($bet->bet_date)->diffForHumans() }}</td>
</tr>