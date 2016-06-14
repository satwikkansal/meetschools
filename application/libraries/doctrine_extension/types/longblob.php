<?php

namespace Meetschools\Doctrine_Extension\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class LongblobType extends Type
{
    const LONG_BLOB = 'longblob';

    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return self::LONG_BLOB;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function getName()
    {
        return self::LONG_BLOB;
    }
}

/* End of file longblob.php */
/* Location: ./application/libraries/doctrine_extension/types/longblob.php */