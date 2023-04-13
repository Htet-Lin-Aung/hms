<img src="{{ asset('img/404.jpg') }}" width="100%" height="100%">

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404 Page Not Found</title>
	<style>
		body {
		  background-image: url('your_image_url.jpg');
		  background-repeat: no-repeat;
		  background-size: cover;
		  position: relative;
		}

		.back-home {
		  position: absolute;
		  top: 93%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  font-size: 24px;
		  color: white;
/*		  background-color: rgba(0, 0, 0, 0.5);*/
		  padding: 10px 60px;
		  border-radius: 8px;
		}
	</style>
</head>
<body>
	<a href="{{ route('admin.dashboard') }}" class="back-home">........</a>
</body>
</html>