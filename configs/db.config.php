<?php   
   //Remote
   
    // define("SERVER","localhost");
    // define("USER","anayet");
    // define("DATABASE","wdpf62_anayet");
    // define("PASSWORD","5800@;;");

   //Local
   
    define("SERVER","localhost");
    define("USER","root");
    define("DATABASE","test");
    define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="core_";
    

?>