<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require _DIR_ . "/database.php";
    
    $sql = sprintf("SELECT * FROM results
                    WHERE id = '%s'");

                   $result = $mysqli->query($sql);
                   $results = $result->fetch_assoc();

                   if ($results) {
         
                    if (password_verify($_POST["id"], $results["id"])) {
                        
                   session_start();
                   $_SESSION["results_id"]=$results["id"];
                   header("location: index.php");
                  exit;
                    }
                }

$is_invalid = true;  
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
   
</head>
<body>
    
    <h1>Results</h1>
    <?php if ($is_invalid): ?>
        <em>Invalid id</em>
        <?php endif; ?>
    <form >
        <label for="id">id</label>
        <input type="id" name="id" id="id">
        <button>Get Results</button>
    </form>
</body>
</html>