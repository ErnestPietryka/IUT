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
            $stmt = $pdo->prepare("SELECT all FROM UserLogin where UserName = ?");
            $res  = $stmt->execute([$username]);
            if ($row=$res->fetch()){
                if($row["Password"] == $password){
                    echo("ok");
                   
                        header("Location:logged.php");

                    
                }
            }
            else {
                echo("non");

            }
            ?>