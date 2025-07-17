<?php
	echo Menu::item([
		"id"=>"ProductionCost",
		"name"=>"Merchandising",
		"icon"=>iconClass([
			"adminlte"=>"nav-icon far fa-credit-card",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
		]),
		"route"=>"#ProductionCost",
		"links"=>[

			["route"=>"mfgbom/create","text"=>"Bill of Materials",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],

			["route"=>"productioncost/create","text"=>"Production cost",
			"icon"=>iconClass([
			"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],
			// ["route"=>"productioncost","text"=>"Manage Production cost",
			// "icon"=>iconClass([
			// 	"adminlte"=>"far fa-circle nav-icon",
			// 	"staradmin"=>"menu-icon mdi mdi-table",
			// 	"intellect"=>"fas fa-question-circle",
			// 	"deskapp"=>"nav-icon fa fa-wrench"
			// ])],
			["route"=>"productdesign/create","text"=>"Create Productdesign",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench"
			])],
			["route"=>"productdesign","text"=>"Manage Productdesign",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],
		]
	]);
