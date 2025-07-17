<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Edit ProductionCost"]);
Html::link(["class"=>"btn btn-success", "route"=>"productioncost", "text"=>"Manage ProductionCost"]);
echo Form::open(["route"=>"productioncost/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productioncost->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$productioncost->name"]);
	echo Form::input(["label"=>"Material Cost","type"=>"text","name"=>"material_cost","value"=>"$productioncost->material_cost"]);
	echo Form::input(["label"=>"Production Cost","type"=>"text","name"=>"production_cost","value"=>"$productioncost->production_cost"]);
	echo Form::input(["label"=>"Product Designs","name"=>"product_designs_id","table"=>"product_designss","value"=>"$productioncost->product_designs_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
