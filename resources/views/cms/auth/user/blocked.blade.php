
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>News - Admin | Blocked</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet">

	<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{asset('blocked/style.css')}}" />

</head>

<body>
	<div id="notfound">
		<div class="notfound">
			<div>
				<div class="notfound-404">
					<h1>!</h1>
				</div>
				<h2>لقد تم<br>حظرك</h2>
			</div>
            <p> لقد تم حظرك من قِبل المسؤول نظراً لتجاوزك المعايير الأساسية للشركة  <br><a href="{{route('user.login.view')}}">العودة إلى صفحة تسجيل الدخول</a></p>
        </div>

	</div>
</body>

</html>
