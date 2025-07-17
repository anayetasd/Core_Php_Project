<?php
Page::open();
Row::open();
Col::open();
Card::open(["title"=>"Create Order"]);
Html::link(["class"=>"btn btn-success", "route"=>"order", "text"=>"Manage Order"]);
echo Form::open(["route"=>"order/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Order Date","type"=>"date","name"=>"order_date"]);
	echo Form::input(["label"=>"Delivery Date","type"=>"date","name"=>"delivery_date"]);
	echo Form::input(["label"=>"Shipping Address","type"=>"textarea","name"=>"shipping_address"]);
	echo Form::input(["label"=>"Order Total","type"=>"text","name"=>"order_total"]);
	echo Form::input(["label"=>"Paid Amount","type"=>"text","name"=>"paid_amount"]);
	echo Form::input(["label"=>"Remark","type"=>"textarea","name"=>"remark"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount"]);
	echo Form::input(["label"=>"Vat","type"=>"text","name"=>"vat"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
Card::close();
Col::close();
Row::close();
Page::close();
