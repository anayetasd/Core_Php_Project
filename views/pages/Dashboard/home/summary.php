<?php
 Page::open();
  Row::open(["g"=>"3"]);
  //Col1
   Col::open(["col"=>3]);
    Card::open(["title"=>"Orders","class-title"=>"text-light","class-head"=>"bg bg-success","class-body"=>"bg bg-light fs-5 fw-bolder d-flex justify-content-center align-items-center"]);
         echo Order::count();
    Card::close();
   Col::close();

  //Col2
   Col::open(["col"=>3]);
   Card::open(["title"=>"Purchase","class-title"=>"text-light","class-head"=>"bg bg-danger","class-body"=>"bg bg-danger text-light fs-5 fw-bolder d-flex justify-content-center align-items-center"]);
   echo Purchase::count();
   Card::close();
  Col::close();


  //Col3
  Col::open(["col"=>3]);
  Card::open(["title"=>"Customer","class-title"=>"text-light","class-head"=>"bg bg-warning","class-body"=>"d-flex justify-content-center align-items-center fs-5 fw-bolder text-warning"]);
  echo Customer::count();
  Card::close();
 Col::close();

 Col::open(["col"=>3]);
 Card::open(["title"=>"Inventory","class-title"=>"text-light","class-head"=>"bg bg-secondary"]);
 echo Product::count();
 Card::close();
Col::close();
  
  Row::close();


  Row::open(["g"=>"3"]);
  //Col1
   Col::open(["col"=>3]);
    Card::open(["title"=>"Sales","class-title"=>"text-light","class-head"=>"bg bg-success"]);
         echo Order::total_sale();
    Card::close();
   Col::close();

  //Col2
   Col::open(["col"=>3]);
   Card::open(["title"=>"Collection","class-title"=>"text-light","class-head"=>"bg bg-danger"]);
   echo "4355";
   Card::close();
  Col::close();
  //Col3
  Col::open(["col"=>3]);
  Card::open(["title"=>"Sales","class-title"=>"text-light","class-head"=>"bg bg-warning"]);
  echo "8956";
  Card::close();
 Col::close();

 Col::open(["col"=>3]);
 Card::open(["title"=>"Sales","class-title"=>"text-light","class-head"=>"bg bg-secondary"]);
 echo "434";
 Card::close();
Col::close();
  
  Row::close();

 Page::close();
?>