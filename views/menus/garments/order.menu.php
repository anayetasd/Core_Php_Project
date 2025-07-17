<?php
	echo Menu::item([
		"id"=>"Order",
		"name"=>"Order",
		"icon"=>iconClass([
			"adminlte"=>"nav-icon fas fa-address-card",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench",
			"focus"=>"nav-icon icon icon-chart-bar-33"
		]),
		"route"=>"#Order",
		"links"=>[
			["route"=>"order/create","text"=>"Create Order",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],
			["route"=>"order","text"=>"Manage Order",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],
		]
	]);
