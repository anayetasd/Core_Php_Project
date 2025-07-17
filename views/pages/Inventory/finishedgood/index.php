<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Manage FinishedGood"]);
Html::link(["class"=>"btn btn-success", "route"=>"finishedgood/create", "text"=>"Create FinishedGood"]);
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo FinishedGood::html_table($page,10);
Card::close();
Col::close();
Row::close();
Page::close();
