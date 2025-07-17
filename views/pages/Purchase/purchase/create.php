<?php
Page::open();
Row::open();
Col::open();
 Card::open(["title"=>"Purchase Invoice"]);

  Doc::open(["name"=>"purchase_invoice"]);

 Card::close();
Col::close();
Row::close();
Page::close();

?>