<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Create RawMaterial"]);
Html::link(["class"=>"btn btn-success", "route"=>"rawmaterial", "text"=>"Manage RawMaterial"]);
echo Form::open(["route"=>"rawmaterial/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Color","type"=>"text","name"=>"color"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Unit","type"=>"text","name"=>"unit"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
