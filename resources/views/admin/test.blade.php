<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="js/addcategory" method="Post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="hidden" value="{{ csrf_token() }}" name="_token">
	<input type="submit" name="submit" value="submit">

	</form>
</body>
</html>