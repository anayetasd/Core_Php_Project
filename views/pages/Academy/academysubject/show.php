<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Show AcademySubject"]);
Html::link(["class"=>"btn btn-success", "route"=>"academysubject", "text"=>"Manage AcademySubject"]);
echo AcademySubject::html_row_details($id);
Card::close();
Col::close();
Row::close();
Page::close();
