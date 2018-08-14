<a href="{{ route('users.edit', $id) }}" class="btn btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-edit"></i> Edit</a>
{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $id] ]) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}


