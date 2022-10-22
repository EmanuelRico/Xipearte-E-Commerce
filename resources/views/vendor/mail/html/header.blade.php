<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Xipearte')
<img src="https://scontent.fntr10-2.fna.fbcdn.net/v/t39.30808-6/302440115_596824511953946_7473883557908069751_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=ZWoDjscIVg4AX-CjDeR&_nc_ht=scontent.fntr10-2.fna&oh=00_AT-KpqC8UpyGx_TbdJi2Zlp811Wzgr2Lq0wzhAR3R-S_tg&oe=6356A342" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
