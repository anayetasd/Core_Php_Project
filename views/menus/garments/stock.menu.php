<?php
	echo Menu::item([
		"id"=>"Stock",
		"name"=>"Stock",
		"icon"=>iconClass([
			"adminlte"=>"nav-icon far fa-address-card",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench",
			"focus"=>"icon icon-app-store",
		]),
		"route"=>"#Stock",
		"links"=>[
			["route"=>"stock/create","text"=>"Create Stock",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],
			["route"=>"stock","text"=>"Manage Stock",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],
		]
	]);
