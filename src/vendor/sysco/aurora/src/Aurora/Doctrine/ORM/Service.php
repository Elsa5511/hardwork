<?php

namespace Sysco\Aurora\Doctrine\ORM;

use Doctrine\ORM\EntityManager;
use Sysco\Aurora\Service\Service as AuroraService;

class Service extends AuroraService
{

    protected $entityManager;

    /**
     * Set the Entity Manager into the service.
     * @param EntityManager $entityManager
     * @return \Doctrine\ORM\EntityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Persist and flush the entity.
     * @param object $entity
     * @param boolean $clear
     * @return object
     */
    public function persist(&$entity, $clear = false)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        if ($clear) {
            $this->getEntityManager()->clear();
        }

        return $entity;
    }

    public function remove($entity, $clear = false)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();

        if ($clear) {
            $this->getEntityManager()->clear();
        }

        return $entity;
    }

}