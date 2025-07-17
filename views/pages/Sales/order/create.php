<?php
Page::open();
  Row::open();
  Col::open(["col"=>12]);  
   Card::open(["title"=>"Sales Order"]);   
    Doc::open(["name"=>"create_order"]); 
   Card::close();
  Col::close();
  Row::close();
Page::close();
?>