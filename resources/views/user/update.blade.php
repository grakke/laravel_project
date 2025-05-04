<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
</head>
<body>
<p>表单</p>
<form action="{{ route('user_update', $id ) }}" method="POST">
	{{-- 两种写法 --}}
	@csrf
	@method('PUT')

	{{--<input type="hidden" name="_method" value="PUT">--}}
	{{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

	<input type="submit">
</form>
</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</html>