<?php
	echo Menu::item([
		"id"=>"Supplier",
		"name"=>"Supplier",
		"icon"=>iconClass([
			"adminlte"=>"nav-icon far fa-chart-bar",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench",
			"focus"=>"nav-icon icon icon-single-copy-06 "
		]),
		"route"=>"#Supplier",
		"links"=>[
			["route"=>"supplier/create","text"=>"Create Supplier",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],
			["route"=>"supplier","text"=>"Manage Supplier",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],

			
			
		]
	]);
