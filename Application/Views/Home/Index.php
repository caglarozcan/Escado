<?Php
	defined('ROOT_PATH') OR exit('Kontrolsüz erişim yapılamaz.');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$title;?></title>
</head>
<body>
	<div>
	<?Php
		foreach ($veri as $key => $value) {
			echo $value['ulke_adi'].'</br>';
		}
	?>
	</div>
</body>
</html>