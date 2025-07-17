<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Edit ProductDesign"]);
Html::link(["class"=>"btn btn-success", "route"=>"productdesign", "text"=>"Manage ProductDesign"]);
echo Form::open(["route"=>"productdesign/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productdesign->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$productdesign->name"]);
	echo Form::input(["label"=>"Size","type"=>"text","name"=>"size","value"=>"$productdesign->size"]);
	echo Form::input(["label"=>"Color","type"=>"text","name"=>"color","value"=>"$productdesign->color"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
