<?php

Namespace Sysco\Aurora\Stdlib;

use \DateTime as PhpDateTime;

class DateTime extends PhpDateTime
{

    /**
     * Parse a date in a desired format
     * @param $format
     * @param $time
     * @param $object [optional]
     * 
     * @return DateTime
     */
    public static function createFromFormat($format, $time, $object = null)
    {
        if ($time) {
            if (null === $object) {
                $dateTime = parent::createFromFormat($format, $time);
            } else {
                $dateTime = parent::createFromFormat($format, $time, $object);
            }

            return new self($dateTime->format('Y-m-d H:i:s'));
        }

        return null;
    }

    /**
     * Return Date in ISO8601 format
     *
     * @return String
     */
    public function __toString()
    {
        return $this->format('Y-m-d H:i:s');
    }

    /**
     * Return difference between $this and $now
     *
     * @param Datetime|String $now
     * @return DateInterval
     */
    public function diff($now = 'NOW', $absolute = NULL)
    {
        if (!($now instanceOf DateTime)) {
            $now = new DateTime($now);
        }

        return parent::diff($now, $absolute);
    }

    /**
     * Return Age in Years
     *
     * @param Datetime|String $now
     * @return Integer
     */
    public function calculateAge($now = 'NOW', $format = '%y')
    {
        return $this->diff($now)->format($format);
    }

}

?>