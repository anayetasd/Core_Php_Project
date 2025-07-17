<?php
	echo Menu::item([
		"id"=>"accounts",
		"name"=>"Financial reporting",
		"icon"=>"nav-icon fas fa-archive",
		"route"=>"#accounts",
		"links"=>[
			["route"=>"accounts/profit_loss","text"=>"profit & Loss","icon"=>"far fa-circle nav-icon"],
			["route"=>"accounts/financial_statement","text"=>"Financial_statement","icon"=>"far fa-circle nav-icon"],
			["route"=>"accounts/product_cost","text"=>"product_cost","icon"=>"far fa-circle nav-icon"],
			
		]
	]);
	