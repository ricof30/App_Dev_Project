    <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */
    $routes->get('/', 'Home::index');
    $routes->get('/getData', 'MainController::getData');
    $routes->get('/getList', 'MainController::getList');
    $routes->get('/getDataEncoded', 'MainController::getDataEncoded');
    $routes->get('/getPending', 'MainController::getPending');
    $routes->get('/getApproved', 'MainController::getApproved');
    $routes->get('/getBeneficiary', 'MainController::getBeneficiary');
    $routes->get('/getValidated', 'MainController::getValidated');
    $routes->get('/getRecycleBin', 'MainController::getRecycleBin');

    $routes->match(['get', 'post'], '/search', 'MainController::search');
    $routes->match(['get', 'post'], '/searchEncoded', 'MainController::searchEncoded');
    $routes->get('/getDetails/(:num)', 'MainController::getDetails/$1');
    $routes->get('/getEncoderDetails/(:num)', 'MainController::getEncoderDetails/$1');
    $routes->match(['get', 'post'], '/insertDetails', 'MainController::insertDetails');
    $routes->match(['get', 'post'], 'insert', 'MainController::insert');
    $routes->match(['get', 'post'], 'addBeneficiary', 'MainController::addBeneficiary');
    $routes->match(['get', 'post'],'updateUserStatus', 'MainController::updateStatus');
    $routes->match(['get', 'post'], '/forgot/(:any)', 'MainController::sendResetEmail');
    $routes->match(['get', 'post'], '/forgotPass/(:any)', 'MainController::sendResetEmailAdmin');

    // for register
    $routes->match(['get', 'post'], '/register', 'MainController::register');
    $routes->match(['get', 'post'], '/login', 'MainController::login');
        // for login and logout
    $routes->match(['get', 'post'], '/getName', 'MainController::getName');
    $routes->match(['get', 'post'], '/logout', 'MainController::logout');

    $routes->match(['get', 'post'], 'approveStaff/(:num)', 'MainController::approveStaff/$1');
    $routes->match(['get', 'post'], 'rejectStaff/(:num)', 'MainController::rejectStaff/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'MainController::update/$1');
    $routes->match(['get', 'post'], 'updatePassword/(:num)', 'MainController::updatePassword/$1');
    $routes->match(['get', 'post'], 'updatePass/(:num)', 'MainController::updatePasswordAdmin/$1');
    $routes->match(['get', 'post'], 'updateBeneficiary/(:num)', 'MainController::updateBeneficiary/$1');
    $routes->match(['get', 'post'], 'deleteBeneficiary/(:num)', 'MainController::deleteBeneficiary/$1');
    $routes->match(['get', 'post'], 'restoreBeneficiary/(:num)', 'MainController::restoreBeneficiary/$1');

    $routes->post( 'upload', 'MainController::uploadExcel');
    $routes->get( 'generate', 'MainController::get');
    $routes->get( 'fetch', 'MainController::fetchData');
    $routes->get( 'chart', 'MainController::getChartData');

    $routes->post( 'adminregister', 'MainController::adminRegister');
    $routes->match(['get', 'post'],  'adminlogin', 'MainController::adminLogin');


    $routes->match(['get', 'post'],     '/validateEncoder', 'MainController::validateEncoder');
