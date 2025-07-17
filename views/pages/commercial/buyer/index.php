<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Manage Buyer"]);
Html::link(["class"=>"btn btn-success", "route"=>"buyer/create", "text"=>"Create Buyer"]);
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo Buyer::html_table($page,10);
Card::close();
Col::close();
Row::close();
Page::close();
