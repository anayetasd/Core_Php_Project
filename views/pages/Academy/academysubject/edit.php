<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Edit AcademySubject"]);
Html::link(["class"=>"btn btn-success", "route"=>"academysubject", "text"=>"Manage AcademySubject"]);
echo Form::open(["route"=>"academysubject/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$academysubject->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$academysubject->name"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
