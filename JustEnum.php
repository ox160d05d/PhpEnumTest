<?php

class JustEnum {
  const VAL1 = 'val1';
  const VAL2 = 'val2';
  const VAL3 = 'val3';
  const VAL4 = 'val4';
  const VAL5 = 'val5';

  public static function isDefined($v) {
    return in_array($v, [self::VAL1, self::VAL2, self::VAL3, self::VAL4, self::VAL5]);
  }
}