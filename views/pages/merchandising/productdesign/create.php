<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Create ProductDesign"]);
Html::link(["class"=>"btn btn-success", "route"=>"productdesign", "text"=>"Manage ProductDesign"]);
echo Form::open(["route"=>"productdesign/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Size","type"=>"text","name"=>"size"]);
	echo Form::input(["label"=>"Color","type"=>"text","name"=>"color"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
