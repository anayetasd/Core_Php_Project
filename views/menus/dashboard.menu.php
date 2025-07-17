<?php
    	echo Menu::item([
		"id"=>"dashboard",
		"name"=>"Dashboard",		
		"icon"=>iconClass([
			"adminlte"=>"nav-icon fas fa-address-book",
		    "staradmin"=>"menu-icon mdi mdi-card-text-outline",
			"intellect"=>"nav-icon fa fa-wrench",
			"deskapp"=>"micon bi bi-archive",
			"focus"=>"nav-icon icon icon-single-04"
		]),
		"route"=>"#dashboard",
		"links"=>[
			["route"=>"Home",
			"text"=>"Home",
			"icon"=>iconClass([
				"adminlte"=>"far fa-circle nav-icon",
				"deskapp"=>"far fa-circle nav-icon",
				"intellect"=>"far fa-circle nav-icon",
			])],
			// ["route"=>"Home/summary",
			// "text"=>"Summary",
			// "icon"=>iconClass([
			// 	"adminlte"=>"far fa-circle nav-icon",
			// 	"deskapp"=>"far fa-circle nav-icon",
			// 	"intellect"=>"far fa-circle nav-icon",
			// ])],
		
        ]
	]);

?>