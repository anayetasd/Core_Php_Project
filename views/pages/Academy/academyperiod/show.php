<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Show AcademyPeriod"]);
Html::link(["class"=>"btn btn-success", "route"=>"academyperiod", "text"=>"Manage AcademyPeriod"]);
echo AcademyPeriod::html_row_details($id);
Card::close();
Col::close();
Row::close();
Page::close();
