<?php
	echo Menu::item([
		"id"=>"FinishedGood",
		"name"=>"Inventory Management",
		"icon"=>iconClass([
			"adminlte"=>"nav-icon fas fa-book",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench",
			"focus"=>"nav-icon icon icon-layout-25"
		]),
		"route"=>"#FinishedGood",
		"links"=>[


			["route"=>"rawmaterial/create","text"=>"Create Rawmaterial",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],
			["route"=>"rawmaterial","text"=>"Manage Rawmaterial",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],
		
			["route"=>"finishedgood/create","text"=>"Create Finishedgood",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],
			["route"=>"finishedgood","text"=>"Manage Finishedgood",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],
			
		]
	]);
