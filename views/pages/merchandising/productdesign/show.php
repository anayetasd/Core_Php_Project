<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Show ProductDesign"]);
Html::link(["class"=>"btn btn-success", "route"=>"productdesign", "text"=>"Manage ProductDesign"]);
echo ProductDesign::html_row_details($id);
Card::close();
Col::close();
Row::close();
Page::close();
