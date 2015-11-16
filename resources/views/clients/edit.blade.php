@include ('head', ['title' => "Edit client"])

<h2>Edit client</h2>

{!! Form::model($client, ['method' => 'PATCH', 'route' => ['clients.update', $client->Id]]) !!}
	@include('clients/partials/_form', ['submit_text' => 'Edit client'])
{!! Form::close() !!}

@include ('foot')