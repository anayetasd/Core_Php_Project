<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Create FinishedGood"]);
Html::link(["class"=>"btn btn-success", "route"=>"finishedgood", "text"=>"Manage FinishedGood"]);
echo Form::open(["route"=>"finishedgood/save"]);
	echo Form::input(["label"=>"Product Code","type"=>"text","name"=>"product_code"]);
	echo Form::input(["label"=>"Product Name","type"=>"text","name"=>"product_name"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);
	echo Form::input(["label"=>"Order Date","type"=>"date","name"=>"order_date"]);
	echo Form::input(["label"=>"Finished Good Status","type"=>"text","name"=>"finished_good_status"]);
	echo Form::input(["label"=>"Batch Number","type"=>"text","name"=>"batch_number"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
