@foreach ($allUser as $index => $u)
    @if ($u->id != $userNow->id)
        <tr>
            <th scope="row">
                {{ $index + 1 }}
            </th>

            <td>{{ $u->name }}</td>

            @if ($u->roles->implode('name', ', ') == 'admin')
                <td>admin</td>
            @else
                <td>user</td>
            @endif

            <td>
                <a href="{{ route('ticket.create', $u->id) }}"
                    class="btn btn-icon btn-primary btn-round btn-xs align-items-center d-flex justify-content-center">
                    <i class="fas fa-comment-dots"></i>
                </a>
            </td>
        </tr>
    @endif
@endforeach
