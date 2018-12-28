<?php

class ReflectionBaseEnum
{
    protected static function getClassConstants()
    {
        $oClass = new \ReflectionClass(get_called_class());
        return $oClass->getConstants();
    }

    public static function isDefined($c)
    {
        return in_array($c, static::getClassConstants());
    }
}

class ReflectionEnum extends ReflectionBaseEnum
{
  const VAL1 = 'val1';
  const VAL2 = 'val2';
  const VAL3 = 'val3';
  const VAL4 = 'val4';
  const VAL5 = 'val5';
}
