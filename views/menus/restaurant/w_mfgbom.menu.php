<?php
	echo Menu::item([
		"id"=>"MfgBom",
		"name"=>"Delivery Invoice",
		"icon"=>iconClass([
			"adminlte"=>"nav-icon far fa-address-book",
			"staradmin"=>"menu-icon mdi mdi-table",
			"intellect"=>"fas fa-question-circle",
			"deskapp"=>"nav-icon fa fa-wrench",
			"focus"=>"nav-icon icon icon-form",
		]),
		"route"=>"#MfgBom",
		"links"=>[
			["route"=>"mfgbom","text"=>"Invoice",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"staradmin"=>"menu-icon mdi mdi-table",
				"intellect"=>"fas fa-question-circle",
				"deskapp"=>"nav-icon fa fa-wrench"
			])],

		
		]
	]);
