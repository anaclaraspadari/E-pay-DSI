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
$routes->add('registration','Home::cadastroUsuario');
$routes->add('sessaoUsuario','Home::sessaoUsuario');
$routes->add('menu','Home::menu');
$routes->add('deposito','Home::deposito');
$routes->add('extrato','Home::extrato');
$routes->add('pagamento','Home::pagamento');
$routes->add('transferencia','Home::transferencia');
$routes->add('poupanca','Home::poupanca');
$routes->add('poupanca/aplicacao','Home::aplicacao');
$routes->add('poupanca/resgate','Home::resgate');
//$routes->add('teste','Home::teste');
//$routes->add('dadosconta','Home::dadosconta');
$routes->add('saldoinicial','Home::saldoinicial');
$routes->add('logoutSessaoUsuario','Home::logoutSessaoUsuario');
$routes->post('processaNovoUsuario','Home::processaCadastroNovoUsuario');
$routes->post('processaNovoPagamento','Home::processaNovoPagamento');
$routes->post('processaNovaTransferencia','Home::processaNovaTransferencia');
$routes->post('processaNovaAplicacao','Home::processaNovaAplicacao');
$routes->post('processaNovoResgate','Home::processaNovoResgate');
$routes->post('processaNovoDeposito','Home::processaNovoDeposito');


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
