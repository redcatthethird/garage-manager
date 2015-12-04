<div class="modal-body">
	<div class="form-group">
		{!! Form::label('LicencePlate', 'Licence plate:') !!}
		{!! Form::text('LicencePlate', null, ['class' => 'form-control', 'placeholder' => 'Licence plate of the new car']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('ClientId', 'Client:') !!}
		{{--!! Form::text('ClientId', isset($car) ? null : 'Client', ['class' => 'form-control']) !!--}}

		<select name='ClientId' class="form-control">
            <option value="" disabled {!! isset($client) ? "" : "selected" !!}> -- Select a client -- </option>
			@foreach(App\Client::all() as $client)
                  <option value="{{ $client->Id }}" {!! (isset($car) && $car->owner->Id == $client->Id ? "selected" : "") !!}> {{ $client->Name . " [" . $client->Id . "]" }}</option>
            @endforeach
        </select>
	</div>
	<div class="form-group">
		{!! Form::label('Model', 'Model:') !!}
		{!! Form::text('Model', null, ['class' => 'form-control', 'placeholder' => 'Car model']) !!}
	</div>
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>


<script>
var frm = $('.modal-dialog form');
frm.submit(function (ev) {
	        // Error...
    ev.preventDefault();
	$(".form-group").removeClass("has-error");
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
	        //ev.target.submit();
	        location.reload(true);
        },
	    error: function(data){
	        var errors = data.responseJSON;
	        if (!errors) return;
	        $.each(errors, function(index, value) {
	            $.gritter.add({
	                title: 'Error: ' + index,
	                text: value
	            });
	        });
	        $.each(errors, function(index, value) {
	        	$("[name=" + index + "]").closest(".form-group").addClass("has-error");
	        });
	    }
    });
});
</script>