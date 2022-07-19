<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->match(['get','post'], 'signup', 'Home::signup');

$routes->match(['get','post'], 'signin', 'Home::signin',["filter" => "noauth"]);

//admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::admin");
});

// lawyer routes
$routes->group("lawyer", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "LawyerController::lawyer");
});

//view recomended cases
$routes->group("lawyer", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "LawyerController::lawyer");
});

// Plaintiff routes
$routes->group("recommendedCases", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "LawyerController::viewCase");
});

//taken cases
$routes->group("takenCases", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "LawyerController::takenCases");
});

//delete case
$routes->get("/cancelCase/(:num)", "LawyerController::cancelCase/$1");

//Lawyer profile
$routes->get("/myProfile/(:num)", "LawyerController::profilePage/$1");

//edit lawyer profile
$routes->get("/myLawyerProfile/(:num)", "LawyerController::editProfileLawyer/$1");

//update lawyer profile
$routes->match(['get','post'],"/editupdateLProfile/(:num)", "LawyerController::updateProfileLawyer/$1");


///////////////////////////////////////////////////////////

//update lawyer profile
$routes->match(['get','post'],"/editupdate/(:num)", "PlaintiffController::updateProfilePlaintiff/$1");

//profile page
$routes->group("profile", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Home::profile");
});

//profile
$routes->get("/profile/(:num)", "PlaintiffController::profilePage/$1");


//Making a case route

// Plaintiff routes
$routes->group("case", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "PlaintiffController::case");
});

$routes->group("plaintiff", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "PlaintiffController::Plaintiff");
});

//taking a case
$routes->get("/takeCase/(:num)", "LawyerController::takeCase/$1");

//lawyers
$routes->group("lawyers", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "PlaintiffController::getAllLawyers");
});
//lawyers
$routes->group("completedcases", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "PlaintiffController::completedCase");
});
//lawyer profile page
$routes->get("/viewProfile/(:num)", "PlaintiffController::lawyerProfilePage/$1");

//my profile page
$routes->get("/myProfile/(:num)", "PlaintiffController::myProfilePage/$1");

//edit user profile
$routes->get("/editProfileP/(:num)", "Home::editProfileP/$1");
$routes->match(['get','post'],"/editupdateProfile/(:num)", "PlaintiffController::updateProfileUser/$1");

//Registering a case
$routes->match(['get','post'],'registerCase', 'PlaintiffController::registerCase',);

//rating lawyer
$routes->post("/rating", "PlaintiffController::rating");

//viewPendingCases
$routes->group("viewPendingCases", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "PlaintiffController::viewPendingCases");
});

//delete cases 
$routes->get("/deleteCase/(:num)", "PlaintiffController::deleteCase/$1");
$routes->get("/deleteCase2/(:num)", "PlaintiffController::deleteCase2/$1");


//getting subcategories
$routes->get("/getCaseCategoriesWhere/(:num)", "PlaintiffController::getCaseCategoriesWhere/$1");

$routes->get('/logout', 'Home::logout');

////////////////////////////////////////////

//admin routes

//lawyers
$routes->group("lawyersd", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::getAllLawyers");
});

//plaintiff
$routes->group("plaintiffs", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::getAllPlaintiffs");
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
