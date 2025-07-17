<?php
	echo Menu::item([
    "id"=>"logout",
		"name"=>"Logout",	
		"icon"=>iconClass([
			"adminlte"=>"nav-icon fas fa-key",
		    "staradmin"=>"menu-icon mdi mdi-layers-outline",
			"intellect"=>"nav-icon fa fa-wrench",
			"deskapp"=>"micon bi bi-textarea-resize",
			"focus"=>"icon-key",
		]),
		"route"=>"$base_url/logout.php"
	]);
