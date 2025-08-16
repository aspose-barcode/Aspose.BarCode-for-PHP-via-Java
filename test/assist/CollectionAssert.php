<?php
namespace assist;

class CollectionAssert
{
    public static function isSubsetOf(array $subset, array $superset)
    {
        Assert::assertTrue(empty(array_diff($subset, $superset)));
    }

}