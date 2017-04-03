<li class="notifications {{ $notification->unread() ? 'unread' : '' }}">
    <a href="/message/{{$notification->id}}?redirect_url=/inbox/"><span>{{$notification->data['name']}}</span> 关注了你</a>
</li>