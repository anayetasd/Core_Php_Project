<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Show ProductionCost"]);
Html::link(["class"=>"btn btn-success", "route"=>"productioncost", "text"=>"Manage ProductionCost"]);
echo ProductionCost::html_row_details($id);
Card::close();
Col::close();
Row::close();
Page::close();
