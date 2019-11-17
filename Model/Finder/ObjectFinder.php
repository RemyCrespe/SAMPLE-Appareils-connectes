<?php

namespace Model\Finder;

use App\Src\App;
use Model\Gateway\ObjectGateway;

class ObjectFinder implements FinderInterface
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
        $query = $this->conn->prepare('SELECT DISTINCT id, name, currentState FROM sample.objects ORDER BY id');
        $query->execute();
        $objects = $query->fetchAll(\PDO::FETCH_ASSOC);

        if (count($objects) === 0)
            return null;

        return $objects;
    }

    public function findAllToJson()
    {
        $objects = $this->findAll();
        return json_encode($objects);
    }

    public function findOneById($id)
    {
        $query = $this->conn->prepare('SELECT id, name, currentState FROM sample.objects WHERE id = :id');
        $query->execute([':id' => $id]);
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if (!is_countable($element) or count($element) === 0)
            return null;

        $object = new ObjectGateway($this->app);
        $object->hydrate($element);

        return $object;
    }

    public function findOneByName(string $name)
    {
        $query = $this->conn->prepare('SELECT id, name, currentState FROM sample.objects WHERE name = :name');
        $query->execute([':name' => $name]);
        $element = $query->fetch(\PDO::FETCH_ASSOC);

        if (!is_countable($element) or count($element) === 0)
            return null;

        $object = new ObjectGateway($this->app);
        $object->hydrate($element);

        return $object;
    }

    public function SaveObject(Array $objectInfos) : Bool
    {
        try
        {
            $user = new ObjectGateway($this->app);
            $user->setName($objectInfos['name']);
            $user->setCurrentState($objectInfos['currentState']);

            $user->insert();

            return true;
        }
        catch (\Error $e)
        {
            return false;
        }
    }

    public function ChangeState(ObjectGateway $object) : bool
    {

        try
        {
            $state = $object->getCurrentState();
            if ($state == 1)
            {
                $object->setCurrentState(0);
                switch ($object->getName())
                {
                    default: var_dump("blablou"); break;
                    case "AM":$this->OFFLED(); break;
                }

            }
            else if ($state == 0)
            {
                $object->setCurrentState(1);

                 switch ($object->getName())
                {
                    default: var_dump("blablou"); break;
                    case "AM":$this->ONLED(); break;
                }
            }

            $object->update();

            return true;
        }
        catch (\Error $e)
        {
            var_dump("Erreur ChangeState");
            return false;
        }
    }

    private function ONLED()
    {
        // Ligne pour activer
        system ( "gpio mode 7 out" );
        system ( "gpio write 7 1" );
    }

    private function OFFLED()
    {
        // Ligne pour désactiver
        system ( "gpio mode 7 out" );
        system ( "gpio write 7 0" );
    }
}