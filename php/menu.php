<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="php/register.php">Register</a></li>
		<?php
		if (!isset($_SESSION['user'])) {
			echo '<li><a href="php/login.php">Login</a></li>';
		} else {
			echo '<li><a href="index.php?log=out">Logout</a></li>';
		}
		?>
		<li>Quiz Me
			<ul>
				<li><a href="php/addition.php">&raquo; Addition</a></li>
				<li><a href="php/subtraction.php">&raquo; Subtraction</a></li>
				<li><a href="php/multiplication.php">&raquo; Multiplication</a></li>
				<li><a href="php/mix.php">&raquo; Mix</a></li>
			</ul>
		</li>
		<li><a href="php/myStats.php">My stats</a></li>
		<li><a href="php/contact.php">Contact us</a></li>
	</ul>
</nav>