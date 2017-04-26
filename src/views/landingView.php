<?php
namespace hw4\views;

class landingView {

	public function __construct(){
		?>
		</h1>
		</head>
    	<body>
		<form action ="index.php?c=edit" method ="post">
		<input id="name" name="name" type="text" placeholder="New sheet name or code">
		<input id="go" name="go" type="submit" value="Go" onclick=check()>
		</form>
		<script>
		function check()
		{
			var name = document.getElementById("name").value;
			var reg = /^[A-Za-z\d\s]+$/;
			if (reg.test(name) == false)
			{
				alert("Input should contain only spaces and alphanumeric characters!")
				document.getElementById('name').onsubmit = function() {
					return false;
				}
			}
		}
		</script>
		</body>
		<?php
	}
}
