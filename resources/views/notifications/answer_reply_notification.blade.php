<li class="notifications {{ $notification->unread() ? 'unread' : '' }}">
    <a href="#"><span>{{$notification->data['name']}}</span> </a>
    回复了你的评论 <a href="/questions/{{$notification->data['id']}}">{{$notification->data['title']}}</a>
</li>