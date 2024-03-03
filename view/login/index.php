<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="/login/signIn" method="POST">
		<label>Username</label>
		<input type="text" name="username">
		<br/>
		<label>Password</label>
		<input type="password" name="password"><br/>
		<span style="color : red"><?= isset($args) ? $args: "başarısız"; ?> </span><br/>
		<button type="submit">Gönder</button>
	</form>

</body>
</html>