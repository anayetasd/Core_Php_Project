<?php
	echo Menu::item([
		"id"=>"Buyer",
		"name"=>"Buyer",
		"icon"=>iconClass([
			"adminlte"=>"nav-icon far fa-chart-bar",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
		]),
		"route"=>"#Buyer",
		"links"=>[
			["route"=>"buyer/create","text"=>"Create Buyer",
			"icon"=>iconClass([
			"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],
			["route"=>"buyer","text"=>"Manage Buyer",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],
		]
	]);
