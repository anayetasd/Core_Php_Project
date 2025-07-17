<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"View Stock Balance"]);

echo Stock::balance();

Card::close();
Col::close();
Row::close();
Page::close();
?>