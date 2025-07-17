<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Edit FinishedGood"]);
Html::link(["class"=>"btn btn-success", "route"=>"finishedgood", "text"=>"Manage FinishedGood"]);
echo Form::open(["route"=>"finishedgood/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$finishedgood->id"]);
	echo Form::input(["label"=>"Product Code","type"=>"text","name"=>"product_code","value"=>"$finishedgood->product_code"]);
	echo Form::input(["label"=>"Product Name","type"=>"text","name"=>"product_name","value"=>"$finishedgood->product_name"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$finishedgood->quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price","value"=>"$finishedgood->price"]);
	echo Form::input(["label"=>"Order Date","type"=>"date","name"=>"order_date","value"=>"$finishedgood->order_date"]);
	echo Form::input(["label"=>"Finished Good Status","type"=>"text","name"=>"finished_good_status","value"=>"$finishedgood->finished_good_status"]);
	echo Form::input(["label"=>"Batch Number","type"=>"text","name"=>"batch_number","value"=>"$finishedgood->batch_number"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
