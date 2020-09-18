<?php

namespace Sysco\Aurora\Doctrine\Stdlib;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Sysco\Aurora\Filter\ArrayKeyUnderscoreToCamelCase;
use Sysco\Aurora\Filter\ArrayKeyCamelCaseToUnderscore;

class Hydrator extends DoctrineHydrator
{

    public function hydrate(array $data, $object)
    {
        $filter = new ArrayKeyUnderscoreToCamelCase;
        $data = $filter->filter($data);

        if ($this->byValue) {
            return $this->hydrateByValue($data, $object);
        }

        return $this->hydrateByReference($data, $object);
    }

    public function extract($object)
    {
        $data = parent::extract($object);
        $filter = new ArrayKeyCamelCaseToUnderscore;
        return $filter->filter($data);
    }

}

?>
