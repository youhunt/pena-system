<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/lang/{locale}', 'Language::index');

$routes->get('/', 'Users::dashboard');
$routes->get('users/dashboard', 'Users::dashboard');
$routes->get('users/index', 'Users::index', ['filter' => 'role:administrator']);
$routes->get('users/add', 'Users::add', ['filter' => 'role:administrator']);
$routes->get('users/changePassword/(:segment)', 'Users::changePassword/$1', ['filter' => 'role:administrator']);

$routes->post('users/getUsers', 'Users::getUsers', ['filter' => 'role:administrator']);
$routes->post('users/save', 'Users::save', ['filter' => 'role:administrator']);
$routes->post('users/changeGroup', 'Users::changeGroup', ['filter' => 'role:administrator']);
$routes->post('users/activate', 'Users::activate', ['filter' => 'role:administrator']);

$routes->get('countries', 'Countries::index', ['filter' => 'role:administrator']);
$routes->get('countries/index', 'Countries::index', ['filter' => 'role:administrator']);
$routes->post('countries/getCountries', 'Countries::getCountries', ['filter' => 'role:administrator']);
$routes->get('countries/getCountry/(:segment)', 'Countries::getCountry/$1', ['filter' => 'role:administrator']);
// $routes->match(['get', 'post'], 'countries/getAll', 'Countries::getAll', ['filter' => 'role:administrator']);
$routes->get('countries/getAll?(:any)', 'Countries::getAll', ['filter' => 'role:administrator']);

$routes->get('states', 'States::index', ['filter' => 'role:administrator']);
$routes->get('states/index', 'States::index', ['filter' => 'role:administrator']);
$routes->get('states/ByCountry/(:segment)', 'States::ByCountry/$1', ['filter' => 'role:administrator']);
$routes->post('states/getStates', 'States::getStates', ['filter' => 'role:administrator']);
$routes->get('states/getByCountry?(:any)', 'States::getByCountry', ['filter' => 'role:administrator']);

$routes->get('cities', 'Cities::index', ['filter' => 'role:administrator']);
$routes->get('cities/index', 'Cities::index', ['filter' => 'role:administrator']);
$routes->get('cities/ByCountry/(:segment)', 'Cities::ByCountry/$1', ['filter' => 'role:administrator']);
$routes->get('cities/ByState/(:segment)', 'Cities::ByState/$1', ['filter' => 'role:administrator']);
$routes->post('cities/getCities', 'Cities::getCities', ['filter' => 'role:administrator']);
$routes->get('cities/getByCountryAndState?(:any)', 'Cities::getByCountryAndState', ['filter' => 'role:administrator']);

$routes->get('uom', 'UOM::index', ['filter' => 'role:administrator']);
$routes->get('uom/index', 'UOM::index', ['filter' => 'role:administrator']);
$routes->post('uom/getUOM', 'UOM::getUOM', ['filter' => 'role:administrator']);
$routes->get('uom/add', 'UOM::add', ['filter' => 'role:administrator']);
$routes->get('uom/edit/(:segment)', 'UOM::edit/$1', ['filter' => 'role:administrator']);
$routes->post('uom/save', 'UOM::save', ['filter' => 'role:administrator']);
$routes->post('uom/update', 'UOM::update', ['filter' => 'role:administrator']);
$routes->post('uom/delete', 'UOM::delete', ['filter' => 'role:administrator']);
$routes->get('uom/getAll?(:any)', 'UOM::getAll', ['filter' => 'role:administrator']);

$routes->get('uomconv', 'UOMConv::index', ['filter' => 'role:administrator']);
$routes->get('uomconv/index', 'UOMConv::index', ['filter' => 'role:administrator']);
$routes->post('uomconv/getUOMConv', 'UOMConv::getUOMConv', ['filter' => 'role:administrator']);
$routes->get('uomconv/add', 'UOMConv::add', ['filter' => 'role:administrator']);
$routes->get('uomconv/edit/(:segment)', 'UOMConv::edit/$1', ['filter' => 'role:administrator']);
$routes->post('uomconv/save', 'UOMConv::save', ['filter' => 'role:administrator']);
$routes->post('uomconv/update', 'UOMConv::update', ['filter' => 'role:administrator']);
$routes->post('uomconv/delete', 'UOMConv::delete', ['filter' => 'role:administrator']);
$routes->get('uomconv/getAll?(:any)', 'UOMConv::getAll', ['filter' => 'role:administrator']);

$routes->get('company', 'Company::index', ['filter' => 'role:administrator']);
$routes->get('company/index', 'Company::index', ['filter' => 'role:administrator']);
$routes->get('company/add', 'Company::add', ['filter' => 'role:administrator']);
$routes->post('company/getCompany', 'Company::getCompany', ['filter' => 'role:administrator']);
$routes->get('company/edit/(:segment)', 'Company::edit/$1', ['filter' => 'role:administrator']);
$routes->post('company/save', 'Company::save', ['filter' => 'role:administrator']);
$routes->post('company/update', 'Company::update', ['filter' => 'role:administrator']);
$routes->post('company/delete', 'Company::delete', ['filter' => 'role:administrator']);

$routes->get('site', 'Site::index', ['filter' => 'role:administrator']);
$routes->get('site/index', 'Site::index', ['filter' => 'role:administrator']);
$routes->get('site/add', 'Site::add', ['filter' => 'role:administrator']);
$routes->post('site/getSite', 'Site::getSite', ['filter' => 'role:administrator']);
$routes->get('site/edit/(:segment)', 'Site::edit/$1', ['filter' => 'role:administrator']);
$routes->post('site/save', 'Site::save', ['filter' => 'role:administrator']);
$routes->post('site/update', 'Site::update', ['filter' => 'role:administrator']);
$routes->post('site/delete', 'Site::delete', ['filter' => 'role:administrator']);

$routes->get('department', 'Department::index', ['filter' => 'role:administrator']);
$routes->get('department/index', 'Department::index', ['filter' => 'role:administrator']);
$routes->get('department/add', 'Department::add', ['filter' => 'role:administrator']);
$routes->post('department/getDepartment', 'Department::getDepartment', ['filter' => 'role:administrator']);
$routes->get('department/edit/(:segment)', 'Department::edit/$1', ['filter' => 'role:administrator']);
$routes->post('department/save', 'Department::save', ['filter' => 'role:administrator']);
$routes->post('department/update', 'Department::update', ['filter' => 'role:administrator']);
$routes->post('department/delete', 'Department::delete', ['filter' => 'role:administrator']);

$routes->get('warehouse', 'Warehouse::index', ['filter' => 'role:administrator']);
$routes->get('warehouse/index', 'Warehouse::index', ['filter' => 'role:administrator']);
$routes->get('warehouse/add', 'Warehouse::add', ['filter' => 'role:administrator']);
$routes->post('warehouse/getWarehouse', 'Warehouse::getWarehouse', ['filter' => 'role:administrator']);
$routes->get('warehouse/edit/(:segment)', 'Warehouse::edit/$1', ['filter' => 'role:administrator']);
$routes->post('warehouse/save', 'Warehouse::save', ['filter' => 'role:administrator']);
$routes->post('warehouse/update', 'Warehouse::update', ['filter' => 'role:administrator']);
$routes->post('warehouse/delete', 'Warehouse::delete', ['filter' => 'role:administrator']);
$routes->get('warehouse/getAll?(:any)', 'Warehouse::getAll', ['filter' => 'role:administrator']);

$routes->get('location', 'Location::index', ['filter' => 'role:administrator']);
$routes->get('location/index', 'Location::index', ['filter' => 'role:administrator']);
$routes->get('location/add', 'Location::add', ['filter' => 'role:administrator']);
$routes->post('location/getLocation', 'Location::getLocation', ['filter' => 'role:administrator']);
$routes->get('location/edit/(:segment)', 'Location::edit/$1', ['filter' => 'role:administrator']);
$routes->post('location/save', 'Location::save', ['filter' => 'role:administrator']);
$routes->post('location/update', 'Location::update', ['filter' => 'role:administrator']);
$routes->post('location/delete', 'Location::delete', ['filter' => 'role:administrator']);

$routes->get('item', 'Item::index', ['filter' => 'role:administrator']);
$routes->get('item/index', 'Item::index', ['filter' => 'role:administrator']);
$routes->post('item/getItem', 'Item::getItem', ['filter' => 'role:administrator']);
$routes->get('item/add', 'Item::add', ['filter' => 'role:administrator']);
$routes->get('item/edit/(:segment)', 'Item::edit/$1', ['filter' => 'role:administrator']);
$routes->post('item/save', 'Item::save', ['filter' => 'role:administrator']);
$routes->post('item/update', 'Item::update', ['filter' => 'role:administrator']);
$routes->post('item/delete', 'Item::delete', ['filter' => 'role:administrator']);
$routes->get('item/getAll?(:any)', 'Item::getAll', ['filter' => 'role:administrator']);
