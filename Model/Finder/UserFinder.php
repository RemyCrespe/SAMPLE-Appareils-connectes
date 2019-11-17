<?php


namespace Model\Finder;

use App\Src\App;
use Model\Gateway\UserGateway;

class UserFinder implements FinderInterface
{
    /**
     * @var \PDO
     */
    private $conn;

    /**
     * @var App
     */
    private $app;


    public function __construct(App $app) {
        $this->app = $app;
        $this->conn = $this->app->getService('Database')->getConnection();
    }

    public function findAll()
    {
        $query = $this->conn->prepare('SELECT DISTINCT id, username, password, firstName, familyName, email FROM sample.user ORDER BY id');
        $query->execute();
        $users = $query->fetchAll(\PDO::FETCH_ASSOC);

        if (count($users) === 0)
            return null;

        return $users;
    }

    public function findOneById($id)
    {
        $query = $this->conn->prepare('SELECT id, username, password, firstName, familyName, email FROM sample.user WHERE id = :id');
        $query->execute([':id' => $id]);
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if (!is_countable($element) or count($element) === 0)
            return null;

        $user = new UserGateway($this->app);
        $user->hydrate($element);

        return $user;
    }

    public function findOneByName($strIdentity)
    {
        $query = $this->conn->prepare('SELECT id, username, password, firstName, familyName, email FROM sample.user WHERE (username = :name OR email = :email)');
        $query->execute([':name' => $strIdentity, ':email' => $strIdentity]);
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if (!is_countable($element) or count($element) === 0)
            return null;

        $user = new UserGateway($this->app);
        $user->hydrate($element);

        return $user;
    }

    public function VerrifyLogIn(String $strIdentity, String $password) : Bool
    {
        $query = $this->conn->prepare('SELECT user.username, user.password 
                                                FROM `user` 
                                                WHERE (user.username = :username OR user.email = :email) AND user.password = :password');
        $query->execute([':username' => $strIdentity, ':email' => $strIdentity, ':password' => $password]);
        $result = $query->fetch(\PDO::FETCH_ASSOC);


        if (!$result)
        {
            sleep(3);
            return false;
        }

        else
            return true;
    }

    public function CreateUser(Array $userInfos) : Bool
    {
        try
        {
            $user = new UserGateway($this->app);
            $user->setUsername($userInfos['username']);
            $user->setPassword($userInfos['password']);
            $user->setFirstName($userInfos['firstName']);
            $user->setFamilyName($userInfos['familyName']);
            $user->setEmail($userInfos['email']);

            $user->insert(); // !!

            return true;
        }
        catch (\Error $e)
        {
            return false;
        }
    }
}