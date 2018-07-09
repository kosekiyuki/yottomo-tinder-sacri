@if (Auth::id() != $user->id)
    @if (Auth::user()->is_zuttomoing($user->id))
        {!! Form::open(['route' => ['user.unzuttomo', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unzuttomo', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.zuttomo', $user->id]]) !!}
            {!! Form::submit('Zuttomo', ['class' => "btn btn-primary"]) !!}
        {!! Form::close() !!}
    @endif
@endif