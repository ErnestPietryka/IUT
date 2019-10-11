<!DOCTYPE html>
<html>
	<head>
			
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

	
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
            </form>
            <?php 
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $iq = 0;
            $host ="localhost";
            $db = 'iq';
            $user = 'iq';
            $pass = 'iq';
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                 PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                 PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                $pdo = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
            $sql = "INSERT INTO UserLogin (UserName, Password, iq)
            VALUES ('$username', '$password', '$iq')";
            ?>
		</div>
	</body>
</html>
