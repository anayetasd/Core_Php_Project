<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Confirm AcademyAdmission"]);
echo Form::open(["route"=>"academyadmission/delete/$id"]);
echo "Are you sure?";
echo AcademyAdmission::html_row_details($id);
echo Form::input(["name"=>"id", "type"=>"hidden", "value"=>$id]);
echo Form::input(["name"=>"delete", "class"=>"btn btn-danger", "value"=>"Delete", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
