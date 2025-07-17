<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Product_cost"]);

 Doc::open(["name"=>"financial_statement"]);
Card::close();
Col::close();
Row::close();
Page::close();

?>