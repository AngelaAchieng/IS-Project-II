<div class="favorite-list-item">
    @if($user)
        <div data-id="{{ $user->User_id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ Chatify::getUserWithAvatar($user)->avatar }}');">
        </div>
        <p>{{ strlen($user->UserName) > 5 ? substr($user->UserName,0,6).'..' : $user->UserName }}</p>
    @endif
</div>
