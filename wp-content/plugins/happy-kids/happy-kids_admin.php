<?php

function ewp_ticket_admin() {
    add_menu_page( 'Quản lý đặt vé', 'Đặt vé', 'manage_options', 'ewp-ticket/booking-manager.php', '', plugins_url('ewp-ticket/images/Plane_icon.png' ), 6 );
    
}
//add_action('admin_menu', 'ewp_ticket_admin');
function ewp_contact_admin(){
	add_menu_page( 'Quản lý liên lạc', 'Liên lạc', 'manage_options', 'ewp-ticket/contact-manager.php', '', plugins_url('ewp-ticket/images/Plane_icon.png' ), 7 );
}
//add_action('admin_menu', 'ewp_contact_admin');
?>