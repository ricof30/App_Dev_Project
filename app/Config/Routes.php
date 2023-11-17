    <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */
    $routes->get('/', 'Home::index');
    $routes->get('/getData', 'MainController::getData');
    $routes->match(['get', 'post'], '/search', 'MainController::search');
