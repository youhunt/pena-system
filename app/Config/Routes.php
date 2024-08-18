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
$routes->get('countries/getAll?(:any)', 'Countries::getAll', ['filter' => 'role:administrator']);
$routes->get('countries/add', 'Countries::add', ['filter' => 'role:administrator']);
$routes->get('countries/edit/(:segment)', 'Countries::edit/$1', ['filter' => 'role:administrator']);
$routes->post('countries/save', 'Countries::save', ['filter' => 'role:administrator']);
$routes->post('countries/update', 'Countries::update', ['filter' => 'role:administrator']);
$routes->post('countries/delete', 'Countries::delete', ['filter' => 'role:administrator']);

$routes->get('provinces', 'Provinces::index', ['filter' => 'role:administrator']);
$routes->get('provinces/index', 'Provinces::index', ['filter' => 'role:administrator']);
$routes->get('provinces/ByCountry/(:segment)', 'Provinces::ByCountry/$1', ['filter' => 'role:administrator']);
$routes->post('provinces/getProvinces', 'Provinces::getProvinces', ['filter' => 'role:administrator']);
$routes->get('provinces/getByCountry?(:any)', 'Provinces::getByCountry', ['filter' => 'role:administrator']);
$routes->get('provinces/getAll?(:any)', 'Provinces::getAll', ['filter' => 'role:administrator']);
$routes->get('provinces/add', 'Provinces::add', ['filter' => 'role:administrator']);
$routes->get('provinces/edit/(:segment)', 'Provinces::edit/$1', ['filter' => 'role:administrator']);
$routes->post('provinces/save', 'Provinces::save', ['filter' => 'role:administrator']);
$routes->post('provinces/update', 'Provinces::update', ['filter' => 'role:administrator']);
$routes->post('provinces/delete', 'Provinces::delete', ['filter' => 'role:administrator']);

$routes->get('cities', 'Cities::index', ['filter' => 'role:administrator']);
$routes->get('cities/index', 'Cities::index', ['filter' => 'role:administrator']);
$routes->get('cities/ByCountry/(:segment)', 'Cities::ByCountry/$1', ['filter' => 'role:administrator']);
$routes->get('cities/ByProvince/(:segment)', 'Cities::ByProvince/$1', ['filter' => 'role:administrator']);
$routes->post('cities/getCities', 'Cities::getCities', ['filter' => 'role:administrator']);
$routes->get('cities/getByCountryAndProvince?(:any)', 'Cities::getByCountryAndProvince', ['filter' => 'role:administrator']);
$routes->get('cities/getAll?(:any)', 'Cities::getAll', ['filter' => 'role:administrator']);
$routes->get('cities/add', 'Cities::add', ['filter' => 'role:administrator']);
$routes->get('cities/edit/(:segment)', 'Cities::edit/$1', ['filter' => 'role:administrator']);
$routes->post('cities/save', 'Cities::save', ['filter' => 'role:administrator']);
$routes->post('cities/update', 'Cities::update', ['filter' => 'role:administrator']);
$routes->post('cities/delete', 'Cities::delete', ['filter' => 'role:administrator']);

$routes->get('uom', 'UOM::index', ['filter' => 'role:administrator']);
$routes->get('uom/index', 'UOM::index', ['filter' => 'role:administrator']);
$routes->post('uom/getUOM', 'UOM::getUOM', ['filter' => 'role:administrator']);
$routes->get('uom/add', 'UOM::add', ['filter' => 'role:administrator']);
$routes->get('uom/edit/(:segment)', 'UOM::edit/$1', ['filter' => 'role:administrator']);
$routes->post('uom/save', 'UOM::save', ['filter' => 'role:administrator']);
$routes->post('uom/update', 'UOM::update', ['filter' => 'role:administrator']);
$routes->post('uom/delete', 'UOM::delete', ['filter' => 'role:administrator']);
$routes->get('uom/getAll?(:any)', 'UOM::getAll', ['filter' => 'role:administrator']);

$routes->get('convuom', 'ConvUOM::index', ['filter' => 'role:administrator']);
$routes->get('convuom/index', 'ConvUOM::index', ['filter' => 'role:administrator']);
$routes->post('convuom/getConvUOM', 'ConvUOM::getConvUOM', ['filter' => 'role:administrator']);
$routes->get('convuom/add', 'ConvUOM::add', ['filter' => 'role:administrator']);
$routes->get('convuom/edit/(:segment)', 'ConvUOM::edit/$1', ['filter' => 'role:administrator']);
$routes->post('convuom/save', 'ConvUOM::save', ['filter' => 'role:administrator']);
$routes->post('convuom/update', 'ConvUOM::update', ['filter' => 'role:administrator']);
$routes->post('convuom/delete', 'ConvUOM::delete', ['filter' => 'role:administrator']);
$routes->get('convuom/getAll?(:any)', 'ConvUOM::getAll', ['filter' => 'role:administrator']);

$routes->get('company', 'Company::index', ['filter' => 'role:administrator']);
$routes->get('company/index', 'Company::index', ['filter' => 'role:administrator']);
$routes->get('company/add', 'Company::add', ['filter' => 'role:administrator']);
$routes->post('company/getCompany', 'Company::getCompany', ['filter' => 'role:administrator']);
$routes->get('company/edit/(:segment)', 'Company::edit/$1', ['filter' => 'role:administrator']);
$routes->post('company/save', 'Company::save', ['filter' => 'role:administrator']);
$routes->post('company/update', 'Company::update', ['filter' => 'role:administrator']);
$routes->post('company/delete', 'Company::delete', ['filter' => 'role:administrator']);
$routes->get('company/getAll?(:any)', 'Company::getAll', ['filter' => 'role:administrator']);

$routes->get('site', 'Site::index', ['filter' => 'role:administrator']);
$routes->get('site/index', 'Site::index', ['filter' => 'role:administrator']);
$routes->get('site/add', 'Site::add', ['filter' => 'role:administrator']);
$routes->post('site/getSite', 'Site::getSite', ['filter' => 'role:administrator']);
$routes->get('site/getByCompany?(:any)', 'Site::getByCompany', ['filter' => 'role:administrator']);
$routes->get('site/edit/(:segment)', 'Site::edit/$1', ['filter' => 'role:administrator']);
$routes->post('site/save', 'Site::save', ['filter' => 'role:administrator']);
$routes->post('site/update', 'Site::update', ['filter' => 'role:administrator']);
$routes->post('site/delete', 'Site::delete', ['filter' => 'role:administrator']);
$routes->get('site/getAll?(:any)', 'Site::getAll', ['filter' => 'role:administrator']);

$routes->get('department', 'Department::index', ['filter' => 'role:administrator']);
$routes->get('department/index', 'Department::index', ['filter' => 'role:administrator']);
$routes->get('department/add', 'Department::add', ['filter' => 'role:administrator']);
$routes->post('department/getDepartment', 'Department::getDepartment', ['filter' => 'role:administrator']);
$routes->get('department/edit/(:segment)', 'Department::edit/$1', ['filter' => 'role:administrator']);
$routes->post('department/save', 'Department::save', ['filter' => 'role:administrator']);
$routes->post('department/update', 'Department::update', ['filter' => 'role:administrator']);
$routes->post('department/delete', 'Department::delete', ['filter' => 'role:administrator']);
$routes->get('department/getBySite?(:any)', 'Department::getBySite', ['filter' => 'role:administrator']);
$routes->get('department/getAll?(:any)', 'Department::getAll', ['filter' => 'role:administrator']);

$routes->get('warehouse', 'Warehouse::index', ['filter' => 'role:administrator']);
$routes->get('warehouse/index', 'Warehouse::index', ['filter' => 'role:administrator']);
$routes->get('warehouse/add', 'Warehouse::add', ['filter' => 'role:administrator']);
$routes->post('warehouse/getWarehouse', 'Warehouse::getWarehouse', ['filter' => 'role:administrator']);
$routes->get('warehouse/edit/(:segment)', 'Warehouse::edit/$1', ['filter' => 'role:administrator']);
$routes->post('warehouse/save', 'Warehouse::save', ['filter' => 'role:administrator']);
$routes->post('warehouse/update', 'Warehouse::update', ['filter' => 'role:administrator']);
$routes->post('warehouse/delete', 'Warehouse::delete', ['filter' => 'role:administrator']);
$routes->get('warehouse/getAll?(:any)', 'Warehouse::getAll', ['filter' => 'role:administrator']);
$routes->get('warehouse/getByDepartment?(:any)', 'Warehouse::getByDepartment', ['filter' => 'role:administrator']);

$routes->get('transactioncode', 'TransactionCode::index', ['filter' => 'role:administrator']);
$routes->get('transactioncode/index', 'TransactionCode::index', ['filter' => 'role:administrator']);
$routes->get('transactioncode/add', 'TransactionCode::add', ['filter' => 'role:administrator']);
$routes->post('transactioncode/getTransactionCode', 'TransactionCode::getTransactionCode', ['filter' => 'role:administrator']);
$routes->get('transactioncode/edit/(:segment)', 'TransactionCode::edit/$1', ['filter' => 'role:administrator']);
$routes->post('transactioncode/save', 'TransactionCode::save', ['filter' => 'role:administrator']);
$routes->post('transactioncode/update', 'TransactionCode::update', ['filter' => 'role:administrator']);
$routes->post('transactioncode/delete', 'TransactionCode::delete', ['filter' => 'role:administrator']);
$routes->get('transactioncode/getAll?(:any)', 'TransactionCode::getAll', ['filter' => 'role:administrator']);

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

$routes->get('itmuomconv', 'ItmUOMConv::index', ['filter' => 'role:administrator']);
$routes->get('itmuomconv/index', 'ItmUOMConv::index', ['filter' => 'role:administrator']);
$routes->post('itmuomconv/getItmUOMConv', 'ItmUOMConv::getItmUOMConv', ['filter' => 'role:administrator']);
$routes->get('itmuomconv/add', 'ItmUOMConv::add', ['filter' => 'role:administrator']);
$routes->get('itmuomconv/edit/(:segment)', 'ItmUOMConv::edit/$1', ['filter' => 'role:administrator']);
$routes->post('itmuomconv/save', 'ItmUOMConv::save', ['filter' => 'role:administrator']);
$routes->post('itmuomconv/update', 'ItmUOMConv::update', ['filter' => 'role:administrator']);
$routes->post('itmuomconv/delete', 'ItmUOMConv::delete', ['filter' => 'role:administrator']);
$routes->get('itmuomconv/getAll?(:any)', 'ItmUOMConv::getAll', ['filter' => 'role:administrator']);

$routes->get('costtype', 'CostType::index', ['filter' => 'role:administrator']);
$routes->get('costtype/index', 'CostType::index', ['filter' => 'role:administrator']);
$routes->get('costtype/add', 'CostType::add', ['filter' => 'role:administrator']);
$routes->post('costtype/getCostType', 'CostType::getCostType', ['filter' => 'role:administrator']);
$routes->get('costtype/edit/(:segment)', 'CostType::edit/$1', ['filter' => 'role:administrator']);
$routes->post('costtype/save', 'CostType::save', ['filter' => 'role:administrator']);
$routes->post('costtype/update', 'CostType::update', ['filter' => 'role:administrator']);
$routes->post('costtype/delete', 'CostType::delete', ['filter' => 'role:administrator']);
$routes->get('costtype/getAll?(:any)', 'CostType::getAll', ['filter' => 'role:administrator']);

$routes->get('bom', 'BOM::index', ['filter' => 'role:administrator']);
$routes->get('bom/index', 'BOM::index', ['filter' => 'role:administrator']);
$routes->get('bom/add', 'BOM::add', ['filter' => 'role:administrator']);
$routes->post('bom/getBOM', 'BOM::getBOM', ['filter' => 'role:administrator']);
$routes->get('bom/edit/(:segment)', 'BOM::edit/$1', ['filter' => 'role:administrator']);
$routes->post('bom/save', 'BOM::save', ['filter' => 'role:administrator']);
$routes->post('bom/update', 'BOM::update', ['filter' => 'role:administrator']);
$routes->post('bom/delete', 'BOM::delete', ['filter' => 'role:administrator']);
$routes->get('bom/getAll?(:any)', 'BOM::getAll', ['filter' => 'role:administrator']);
$routes->post('bom/getBOMChild', 'BOM::getBOMChild', ['filter' => 'role:administrator']);
$routes->post('bom/saveChild', 'BOM::saveChild', ['filter' => 'role:administrator']);
$routes->post('bom/updateChild', 'BOM::updateChild', ['filter' => 'role:administrator']);
$routes->post('bom/deleteChild', 'BOM::deleteChild', ['filter' => 'role:administrator']);
$routes->post('bom/getBOMChildById', 'BOM::getBOMChildById', ['filter' => 'role:administrator']);

$routes->get('work_center', 'WorkCenter::index', ['filter' => 'role:administrator']);
$routes->get('work_center/index', 'WorkCenter::index', ['filter' => 'role:administrator']);
$routes->get('work_center/add', 'WorkCenter::add', ['filter' => 'role:administrator']);
$routes->post('work_center/getWorkCenter', 'WorkCenter::getWorkCenter', ['filter' => 'role:administrator']);
$routes->get('work_center/edit/(:segment)', 'WorkCenter::edit/$1', ['filter' => 'role:administrator']);
$routes->post('work_center/save', 'WorkCenter::save', ['filter' => 'role:administrator']);
$routes->post('work_center/update', 'WorkCenter::update', ['filter' => 'role:administrator']);
$routes->post('work_center/delete', 'WorkCenter::delete', ['filter' => 'role:administrator']);
$routes->get('work_center/getAll?(:any)', 'WorkCenter::getAll', ['filter' => 'role:administrator']);
$routes->post('work_center/getWorkCenterMachine', 'WorkCenter::getWorkCenterMachine', ['filter' => 'role:administrator']);
$routes->post('work_center/saveMachine', 'WorkCenter::saveMachine', ['filter' => 'role:administrator']);
$routes->post('work_center/updateMachine', 'WorkCenter::updateMachine', ['filter' => 'role:administrator']);
$routes->post('work_center/deleteMachine', 'WorkCenter::deleteMachine', ['filter' => 'role:administrator']);
$routes->post('work_center/getWorkCenterMachineById', 'WorkCenter::getWorkCenterMachineById', ['filter' => 'role:administrator']);
$routes->post('work_center/getWorkCenterCost', 'WorkCenter::getWorkCenterCost', ['filter' => 'role:administrator']);
$routes->post('work_center/saveCost', 'WorkCenter::saveCost', ['filter' => 'role:administrator']);
$routes->post('work_center/updateCost', 'WorkCenter::updateCost', ['filter' => 'role:administrator']);
$routes->post('work_center/deleteCost', 'WorkCenter::deleteCost', ['filter' => 'role:administrator']);
$routes->post('work_center/getWorkCenterCostById', 'WorkCenter::getWorkCenterCostById', ['filter' => 'role:administrator']);
