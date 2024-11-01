{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="messenger-list-item" data-contact="{{ Auth::user()->User_id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="saved-messages avatar av-m">
                    <span class="far fa-bookmark"></span>
                </div>
            </td>
            {{-- Center side --}}
            <td>
                <p data-id="{{ Auth::user()->User_id }}" data-type="user">
                    Saved Messages <span>You</span>
                </p>
                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Contact list -------------------- --}}
@if($get == 'users' && isset($lastMessage) && isset($user))
<?php
    // Truncate the last message to 30 characters with UTF-8 support
    $lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
    $lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8') . '..' : $lastMessageBody;
?>
    <table class="messenger-list-item" data-contact="{{ $user->User_id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td style="position: relative">
                @if($user->active_status)
                    <span class="activeStatus"></span>
                @endif
                <div class="avatar av-m" style="background-image: url('{{ $user->avatar }}');">
                </div>
            </td>
            {{-- Center side --}}
            <td>
                <p data-id="{{ $user->User_id }}" data-type="user">
                    {{ strlen($user->UserName) > 12 ? trim(substr($user->UserName, 0, 12)) . '..' : $user->UserName }}
                    <span class="contact-item-time" data-time="{{ $lastMessage->created_at }}">{{ $lastMessage->timeAgo }}</span>
                </p>
                <span>
                    {{-- Last Message user indicator --}}
                    {!! $lastMessage->from_id == Auth::user()->User_id ? '<span class="lastMessageIndicator">You :</span>' : '' !!}
                    
                    {{-- Last message body --}}
                    @if($lastMessage->attachment == null)
                        {!! $lastMessageBody !!}
                    @else
                        <span class="fas fa-file"></span> Attachment
                    @endif
                </span>
                {{-- New messages counter --}}
                {!! $unseenCounter > 0 ? "<b>{$unseenCounter}</b>" : '' !!}
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item' && isset($user))
    <table class="messenger-list-item" data-contact="{{ $user->User_id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="avatar av-m" style="background-image: url('{{ $user->avatar }}');">
                </div>
            </td>
            {{-- Center side --}}
            <td>
                <p data-id="{{ $user->User_id }}" data-type="user">
                    {{ strlen($user->UserName) > 12 ? trim(substr($user->UserName, 0, 12)) . '..' : $user->UserName }}
                </p>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Shared Photos Item -------------------- --}}
@if($get == 'sharedPhoto' && isset($image))
    <div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif
