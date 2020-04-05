<?php
/**
 * Created by PhpStorm.
 * User: PKPU-26
 * Date: 3/8/2019
 * Time: 7:17 AM
 */

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity as Entity;

class ConfigMGR
{
    protected $em;
    protected $config;

    function __construct(EntityMGR $entityMgr)
    {
        $this->em = $entityMgr;
        $this->config = $this->em->findOneBy('App:SysConfig',['configCode'=>0]);
        if(is_null($this->config))
        {
            $config = new Entity\SysConfig();
            $config->setSiteName('your new blog');
            $config->setConfigCode(0);
            $this->em->insertEntity($config);
            $this->config = $config;
        }
    }

    public function getConfig()
    {
        return $this->config;
    }

}