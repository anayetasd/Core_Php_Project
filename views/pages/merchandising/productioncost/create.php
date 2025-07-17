<?php
// Page::open();
// Row::open();
// Col::open();
// Card::open(["title"=>"Create ProductionCost"]);
// Html::link(["class"=>"btn btn-success", "route"=>"productioncost", "text"=>"Manage ProductionCost"]);
// echo Form::open(["route"=>"productioncost/save"]);
// 	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
// 	echo Form::input(["label"=>"Material Cost","type"=>"text","name"=>"material_cost"]);
// 	echo Form::input(["label"=>"Production Cost","type"=>"text","name"=>"production_cost"]);
// 	echo Form::input(["label"=>"Product Designs","name"=>"product_designs_id","table"=>"product_designs"]);

// echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
// echo Form::close();
// Card::close();
// Col::close();
// Row::close();
// Page::close();



Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Create production cost"]);

 Doc::open(["name"=>"production"]);
Card::close();
Col::close();
Row::close();
Page::close();
