<?php
/**
 * Created by PhpStorm.
 * User: Corentin
 * Date: 02/04/2019
 * Time: 10:24
 */

namespace App;

use App\Src\App;
use App\Src\Request\Request;
use Controllers\UserController;

class Routing
{
    private $app;

    /**
     * Routing constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function setup()
    {
        $user = new UserController($this->app);

        $this->app->get('/', [$user, 'LoginHandler']);

        $this->app->post('/login', [$user, 'LoginDBHandler']);

        $this->app->get('/register', [$user, 'RegisterHandler']);

        $this->app->post('/tryRegister', [$user, 'RegisterDBHandler']);

        $this->app->get('/home', [$user, 'HomeHandler']);

        $this->app->get('/home/(\d+)', [$user, 'HomeHandler']);

        $this->app->get('/home/camera', [$user, 'CameraHandler']);

        $this->app->get('/home/camera/get', function ()
        {
            $image = fopen("/images/motion/image.txt", "r") or die("Unable to open file!");
            echo fread($image, filesize("/images/motion/image.txt"));
            fclose($image);
        });

        $this->app->get('/user', [$user, 'UserHandler']);

        $this->app->post('/user/update', [$user, 'UserDBUpdate']);

    }
}