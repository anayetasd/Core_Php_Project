<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Manage ProductDesign"]);
Html::link(["class"=>"btn btn-success", "route"=>"productdesign/create", "text"=>"Create ProductDesign"]);
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo ProductDesign::html_table($page,10);
Card::close();
Col::close();
Row::close();
Page::close();
