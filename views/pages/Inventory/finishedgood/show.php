<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Show FinishedGood"]);
Html::link(["class"=>"btn btn-success", "route"=>"finishedgood", "text"=>"Manage FinishedGood"]);
echo FinishedGood::html_row_details($id);
Card::close();
Col::close();
Row::close();
Page::close();
