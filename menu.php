<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="register.php">Register</a></li>
        <?php
        if (!isset($_SESSION['user'])) {
            echo '<li><a href="login.php?">Login</a></li>';
        } else {
            echo '<li><a href="index.php?log=out">Logout</a></li>';
        }
        ?>
        <li>Quiz Me
            <ul>
                <li><a href="addition.php">&raquo; Addition</a></li>
                <li><a href="subtraction.php">&raquo; Subtraction</a></li>
                <li><a href="multiplication.php">&raquo; Multiplication</a></li>
                <li><a href="mix.php">&raquo; Mix</a></li>
            </ul>
        </li>
        <li><a href="myStats.php">My stats</a></li>
        <li><a href="contact.php">Contact us</a></li>
    </ul>
</nav>
