<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span>
	</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<textarea class="form-control" name="additional_info" id="description" placeholder="" rows="50"></textarea>
	</div>
</div>
<script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
<script>
	window.onload = function() {
		CKEDITOR.replace( 'description', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("add-post-project") }}',
            filebrowserUploadMethod: 'form'
		});
	};
</script>
</body>
</html>