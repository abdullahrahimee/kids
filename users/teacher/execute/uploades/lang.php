<?php 
    if(!isset($_GET['lang']) | empty($_GET['lang']) | $_GET['lang']=='') 
    {
        $lang="da";
    }

    else {
        if($_GET['lang']!='en' & $_GET['lang']!='da' & $_GET['lang']!='ps'){
            $lang='da';
        }
        else{
            $lang=$_GET['lang'];
        }
    }


    if($lang=='en')
        {
            include("languages/en.php");
            echo "<link rel='stylesheet' href='style/bootstrap.css'/>";
            echo "<link rel='stylesheet' href='style/ltr.css'/>";
        }

        elseif($lang=='da' || $lang=='ps')
        {
            include("languages/".$lang.".php");
            echo "<link rel='stylesheet' href='css/bootstrap.css'/>";
            echo "<link rel='stylesheet' href='style/rtl.css'/>";
        }
?>