<?php

function add_administrator_capabilities() {
	$administrator = get_role( 'administrator' );

	$administrator->add_cap('read');
	$administrator->add_cap('edit_soin');
	$administrator->add_cap('read_soin');
	$administrator->add_cap('delete_soin');
	$administrator->add_cap('edit_soins');
	$administrator->add_cap('edit_others_soins');
	$administrator->add_cap('delete_soins');
	$administrator->add_cap('publish_soins');
	$administrator->add_cap('read_private_soins');
	$administrator->add_cap('delete_private_soins');
	$administrator->add_cap('delete_published_soins');
	$administrator->add_cap('delete_others_soins');
	$administrator->add_cap('edit_private_soins');
	$administrator->add_cap('edit_published_soins');
	$administrator->add_cap('create_soins');

	$administrator->add_cap('manage_types');
	$administrator->add_cap('manage_ingredients');
}

function remove_administrator_capabilities() {
	$administrator = get_role( 'administrator' );

	$administrator->remove_cap('read');
	$administrator->remove_cap('edit_soin');
	$administrator->remove_cap('read_soin');
	$administrator->remove_cap('delete_soin');
	$administrator->remove_cap('edit_soins');
	$administrator->remove_cap('edit_others_soins');
	$administrator->remove_cap('delete_soins');
	$administrator->remove_cap('publish_soins');
	$administrator->remove_cap('read_private_soins');
	$administrator->remove_cap('delete_private_soins');
	$administrator->remove_cap('delete_published_soins');
	$administrator->remove_cap('delete_others_soins');
	$administrator->remove_cap('edit_private_soins');
	$administrator->remove_cap('edit_published_soins');
	$administrator->remove_cap('create_soins');

	$administrator->remove_cap('manage_types');
	$administrator->remove_cap('manage_ingredients');
}
