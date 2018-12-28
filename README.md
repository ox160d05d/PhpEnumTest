I just put it here since I always forget how much slower a PHP script become if Reflection is used to check a constant
existence.

We can use a much simple solution as Enum in PHP:
```
class JustEnum {
  const VAL1 = 'val1';

  public static function isDefined($v) {
    return in_array($v, [self::VAL1]);
  }
}
```

The main drawback of this solution is that a developer can forget to update isDefined method on adding a new constant 
to the enum. So, can we avoid such mistakes and make our Enum smarter? Yes, we can check if a constant is defined
using Reflection methods:

```
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
```

Let's compare simple benchmark results (Intel(R) Core(TM) i3-3217U CPU @ 1.80GHz):

```
JustEnum took about 0.000321 seconds for 1000 calls of isDefined
ReflectionEnum took about 0.001331 seconds for 1000 calls of isDefined
```

Conclusion: Nobody care. Really. If you call Reflection version of isDefined 1000 times, you will lose less than 1 mSec