<?php
   $cookie_name = "php_test_cookie";
   if ( !isset($_COOKIE[$cookie_name]) ){
      setcookie($cookie_name, "somevaluehere7", time() + 60, "/", "", 0);
   } else {
      setcookie($cookie_name, "", time() - 60, "/", "", 0);
   }

   session_start();

   if(isset($_SESSION['count'])) {
      $_SESSION['count']++;
   } else {
      $_SESSION['count'] = 1;
   }

   echo htmlspecialchars(SID);
?>

<html>
   <head>
      <title>Test php page</title>
      <link rel="stylesheet" type="text/css" href="./style.css"  />
      <!-- <script src="./style.css"></script> -->
   </head>
   <body>
      <?php require("./header.php") ?>
      <?php
         function loadFile(&$filename) {
            $fileptr = fopen($filename, "r");

            if ($fileptr) {
               $filesize = filesize($filename);
               $filetext = fread($fileptr, $filesize);
               fclose($fileptr);
               echo "<br/>fileptr $fileptr";
               echo "<br/>filesize $filesize";
               echo($filetext);
            } else {
               echo "error opening file $filename";
            }

            $filename = '.nope';
         }

         if ( isset($_COOKIE[$cookie_name]) ) {
            echo "Cookie variable: $cookie_name => $_COOKIE[$cookie_name]<br/><br/>";
         }

         if($_POST && ( $_POST["name"] || $_POST["age"] ) ) {
            if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
               die ("invalid name and name should be alpha");
            }
            
            echo "session count: ".$_SESSION['count']."<br/>";
            $_SESSION['count'] > 20 ? session_destroy() : NULL;

            echo "Welcome ". $_POST['name']. "<br />";
            echo "You are ". $_POST['age']. " years old.";
            echo "<br/>";
            echo $_POST["gender"] == "male" ? "you're a dude" : "you're a dudet";
            // echo $_POST['QUERY_STRING'];
            $file = './test_file.txt';
            loadFile($file);
            echo "file $file<br/>";

            $server_keys = array_keys($_SERVER);
            $server_length = count($server_keys);
            echo "server length: $server_length";
            try {
               for($i = 0, $k = $server_keys[$i]; $i < $server_length; $j = ++$i, $k = isset($server_keys[$j]) ? $server_keys[$j] : NULL) {
                  echo "<br/> $i $k: $_SERVER[$k]";
               }
            }
            catch(Exception $e) {

            }

            echo $_SERVER['PHP_SELF'];
    
            exit();
         }
      ?>

      <form action = "<?php $_PHP_SELF ?>" method = "POST">
         Name: <input type = "text" name = "name" />
         Age: <input type = "number" name = "age" />
         Gender: 
        <fieldset>
            <label>Male<input type = "radio" name = "gender" value="male" /></label>
            <label>Female<input type = "radio" name = "gender" value="female" /></label>
        </fieldset>
         <input type = "submit" />
      </form>
      
   </body>
</html>