<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
</head>

<body>
	<input type="text" placeholder="Nama" id="name" />
	<input type="text" placeholder="Age" id="age" />
	<button id="get">get</button>
	<script>
		let nameInput = document.querySelector("#name");
		let ageInput = document.querySelector("#age");
		let get = document.querySelector("#get");

		get.addEventListener("click", async function () {
			const response = await fetch(
				"http://localhost/pustaka-booking/api/get"
			);
			const data = await response.json();
			console.log(data);
		});
	</script>
</body>

</html>