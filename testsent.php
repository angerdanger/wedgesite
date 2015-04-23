<!DOCTYPE html>
<html>
	<head>
		<title>Configuration</title>
		<script>
		window.onload = function()
		{
			if ('<?php echo $_GET['whitebg']; ?>' == '1')
				document.getElementsByName("background")[1].checked = true;

			if ('<?php echo $_GET['verticalwall']; ?>' == '1')
				document.getElementsByName("walls")[1].checked = true;

			if ('<?php echo $_GET['dotsize']; ?>' == '1')
				document.getElementsByName("size")[0].checked = true;
			else if ('<?php echo $_GET['dotsize']; ?>' == '3')
				document.getElementsByName("size")[2].checked = true;

			if ('<?php echo $_GET['speed']; ?>' == '1')
				document.getElementsByName("speed")[0].checked = true;
			else if ('<?php echo $_GET['speed']; ?>' == '3')
				document.getElementsByName("speed")[2].checked = true;
		}

		function save()
		{
			var whitebg = 0, verticalwall = 0, dotsize = 2, speed = 2;

			if (document.getElementsByName("background")[1].checked == true)
				whitebg = 1;

			if (document.getElementsByName("walls")[1].checked == true)
				verticalwall = 1;

			if (document.getElementsByName("size")[0].checked == true)
				dotsize = 1;
			else if (document.getElementsByName("size")[2].checked == true)
				dotsize = 3;

			if (document.getElementsByName("speed")[0].checked == true)
				speed = 1;
			else if (document.getElementsByName("speed")[2].checked == true)
				speed = 3;		

			var options = {
				'whitebg': whitebg,
				'verticalwall': verticalwall,
				'dotsize': dotsize,
				'speed': speed
			}

			document.location = "pebblejs://close#" +encodeURIComponent(JSON.stringify(options));

			alert("okay… so?");	
		}
		</script>
	</head>
	<body>
	Background:
	<br>
	<input type="radio" name="background" value="0" checked>black
	<br>
	<input type="radio" name="background" value="1">white
	</body>

	<br><br>

	Bounce off of:
	<br>
	<input type="radio" name="walls" value="0" checked>horizontal walls
	<br>
	<input type="radio" name="walls" value="1">vertical walls
	</body>

	<br><br>

	Dot size:
	<br>
	<input type="radio" name="size" value="1">small
	<br>
	<input type="radio" name="size" value="2" checked>medium
	<br>
	<input type="radio" name="size" value="3">large
	</body>

	<br><br>

	Speed:
	<br>
	<input type="radio" name="speed" value="1">slow
	<br>
	<input type="radio" name="speed" value="2" checked>medium
	<br>
	<input type="radio" name="speed" value="3">fast
	</body>

	<br>
	<br>

	<button id="save" onclick="save()">Save</button>
</html>
