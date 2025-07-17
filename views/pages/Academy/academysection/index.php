<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Manage AcademySection"]);
Html::link(["class"=>"btn btn-success", "route"=>"academysection/create", "text"=>"Create AcademySection"]);
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo AcademySection::html_table($page,10);
Card::close();
Col::close();
Row::close();
Page::close();
