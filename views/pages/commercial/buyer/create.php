<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Create Buyer"]);
Html::link(["class"=>"btn btn-success", "route"=>"buyer", "text"=>"Manage Buyer"]);
echo Form::open(["route"=>"buyer/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email"]);
	echo Form::input(["label"=>"Phonenumber","type"=>"text","name"=>"phoneNumber"]);
	echo Form::input(["label"=>"Address","type"=>"text","name"=>"address"]);
	echo Form::input(["label"=>"Paymentmethod","type"=>"text","name"=>"paymentMethod"]);
	echo Form::input(["label"=>"Amount","type"=>"text","name"=>"amount"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
