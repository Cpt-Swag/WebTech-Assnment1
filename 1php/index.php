
<?php
	require('common.php');
    
    //   readz();
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
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        
       <div class="jumbotron">
        <h1><a href="../index.php">INFO 3410 Assignment 1 </a></h1>     
        </div>
        
        <?php 
        
        $word_list = uneeq_freeq_sans_common();
        
        # table of said frequencies
        echo "<h2> Word List and Frequency</h2>";
        make_table($word_list);
        echo "Amount of values... " . count($word_list); 
        echo "<br> <br>";  
        #Upload to databse
        db_setup();

        # calculate the median of the words
        // $median = calc_median();
        // echo $median;
        
        # calculate the mode of the words
    //    echo "<br> <br>";
    //    echo "The mode vaule is... ";
    //    calc_mode($word_list);

    //    echo "<br> <br>";
    //    echo "The mean vaule is... ";
    //    echo calc_mean($word_list);
    
        # calculate the mean of the words
    //    echo "<br> <br>";
    //    echo "The Standard Deviation vaule is... ";
    //    echo calc_stdev($word_list);

       
       echo "<br>";
       make_diff_table(calc_mmmstd());
       
            


            
        ?>
   
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
