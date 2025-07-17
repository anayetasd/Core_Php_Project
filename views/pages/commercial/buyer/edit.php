<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Edit Buyer"]);
Html::link(["class"=>"btn btn-success", "route"=>"buyer", "text"=>"Manage Buyer"]);
echo Form::open(["route"=>"buyer/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$buyer->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$buyer->name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$buyer->email"]);
	echo Form::input(["label"=>"Phonenumber","type"=>"text","name"=>"phoneNumber","value"=>"$buyer->phoneNumber"]);
	echo Form::input(["label"=>"Address","type"=>"text","name"=>"address","value"=>"$buyer->address"]);
	echo Form::input(["label"=>"Paymentmethod","type"=>"text","name"=>"paymentMethod","value"=>"$buyer->paymentMethod"]);
	echo Form::input(["label"=>"Amount","type"=>"text","name"=>"amount","value"=>"$buyer->amount"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
