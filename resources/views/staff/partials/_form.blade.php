<div class="modal-body">
	<div class="form-group">
		{!! Form::label('Name', 'Name:') !!}
		{!! Form::text('Name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Address', 'Address:') !!}
		{!! Form::text('Address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('PhoneNo', 'Phone number:') !!}
		{!! Form::text('PhoneNo', null, ['class' => 'form-control', 'placeholder' => 'Phone number']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Email', 'E-mail:') !!}
		{!! Form::text('Email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
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
	    error: function(data) {
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