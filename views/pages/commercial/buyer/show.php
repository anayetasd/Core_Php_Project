<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Show Buyer"]);
Html::link(["class"=>"btn btn-success", "route"=>"buyer", "text"=>"Manage Buyer"]);
echo Buyer::html_row_details($id);
Card::close();
Col::close();
Row::close();
Page::close();
