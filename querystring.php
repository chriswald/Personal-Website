<!DOCTYPE html>

<html>
    <head>
        <title>Display query parameters</title>
    </head>
    
    <body style="font-family:monospace">
        <div>
            <strong>Raw:</strong><br/>
            <?php echo $_SERVER["QUERY_STRING"]; ?>
        </div>
        <br/>
        <div>
            <strong>URL Decoded:</strong><br/>
            <?php echo urldecode($_SERVER["QUERY_STRING"]); ?>
        </div>
        <br/>
        <div>
            <strong>By Parameter:</strong><br/>
            <?php
                foreach ($_GET as $key => $value)
                {
                    echo $key . " => " . $value . "<br/>";
                }
            ?>
        </div>
    </body>
</html>