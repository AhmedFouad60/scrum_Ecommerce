<a href="{{ route('coupons.edit', $id) }}" class="btn btn-info pull-left" style="margin-right: 3px;margin-bottom: 4px;"><i class="fa fa-edit"></i> Edit</a>
{!! Form::open(['method' => 'DELETE', 'route' => ['coupons.destroy', $id] ]) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}


