<a href="{{ route('products.edit', $id) }}" class="btn btn-info pull-left" style="margin-right: 3px;"><i class="fa fa-edit"></i> Edit</a>
<!-- <a href="{{ route('products.destroy', $id) }}" class="btn btn-danger pull-left" style="margin-right: 3px;"><i class="fa fa-trash" -->


<!-- ></i> Delete</a> -->

{!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $id] ]) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}