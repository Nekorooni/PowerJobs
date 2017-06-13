<?php
require('inc/base-header.php');
if (isset($_GET['page'])){
    switch($_GET['page']){
        case 'about':
            include('inc/page_about.php');
            break;
        case 'faq':
            include('inc/page_faq.php');
            break;
        case 'contact':
            include('inc/page_contact.php');
            break;
        case 'login':
            include('inc/page_login.php');
            break;
        case 'register':
            include('inc/page_register.php');
            break;
        case 'admin':
            include('inc/page_admin.php');
            break;
        default:
        case 'home':
            include('inc/page_home.php');
            break;
    }
}else{
    include('inc/page_home.php');
}
require('inc/base-footer.php');
