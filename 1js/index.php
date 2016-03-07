<?php
	require('common.php');
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $mySiteName; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 20px;
                padding-left: 10px;
                padding-bottom: 20px;
                padding-right: 10px;
            }
            #leftcolumn { 
                width: 600px;  
                float: left;
            }
            #rightcolumn { 
                width: 600px;
                float: right;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>

    <body>   
        
        <div class="jumbotron">
        <h1><a href="../index.php">INFO 3410 Assignment 1 </a></h1>     
        </div>
        
        <h4> Enter Paragraph and Press Enter! </h4><br>
    	<form> 
			<textarea id="myText" rows="4" cols="50" onkeypress="return searchKeyPress(event)"></textarea>
			<br>
    		<input class="btn btn-default type="submit" id="btn" value="Analyze" onclick="return extractText(this.form)"/>
		</form> 
        <br>
        <div id="leftcolumn" name="demo"> </div>
        <div id="rightcolumn" name="demoo"> </div>
        <br>
    <script src="js/main.js"></script>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Creators</h3>
        </div>
        <div class="panel-body">
            Akin Bascombe & Aniesha Scott
        </div>
        </div>
        
    </body>
</html>