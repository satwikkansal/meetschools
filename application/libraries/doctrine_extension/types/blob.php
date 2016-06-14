<?php

namespace Meetschools\Doctrine_Extension\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class BlobType extends Type
{
    const BLOB = 'blob';

    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return self::BLOB;
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
        return self::BLOB;
    }
}

/* End of file blob.php */
/* Location: ./application/libraries/doctrine_extension/types/blob.php */