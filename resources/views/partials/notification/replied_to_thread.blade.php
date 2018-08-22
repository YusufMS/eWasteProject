<a class="dropdown-item " href="/posts/{{ ($notification->data['post']['id']) }}">

    {!! ($notification->data['user']['email']) ." has commented on " .($notification->data['post']['title']) !!}


</a>