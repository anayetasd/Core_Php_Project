<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Manage ProductionCost"]);
Html::link(["class"=>"btn btn-success", "route"=>"productioncost/create", "text"=>"Create ProductionCost"]);
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo ProductionCost::html_table($page,10);
Card::close();
Col::close();
Row::close();
Page::close();
