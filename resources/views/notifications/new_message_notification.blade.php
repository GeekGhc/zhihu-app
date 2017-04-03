<li class="notifications {{ $notification->unread() ? 'unread' : '' }}">
    <a href="/message/{{$notification->id}}?redirect_url=/inbox/{{$notification->data['dialog']}}">
        <span>{{$notification->data['name']}}</span>  给你发了一条私信</a>
</li>