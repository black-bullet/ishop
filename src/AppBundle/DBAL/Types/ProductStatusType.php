<?php

namespace AppBundle\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * Class ProductStatusType
 *
 * @author Yevgeniy Zholkevskiy <zhenya.zholkevskiy@gmail.com>
 */
final class ProductStatusType extends AbstractEnumType
{
    const NOT_AVAILABLE     = 'NA';
    const EXPECTED_DELIVERY = 'ED';
    const AVAILABLE         = 'A';

    protected static $choices = [
        self::NOT_AVAILABLE     => 'Not available',
        self::EXPECTED_DELIVERY => 'Expected delivery',
        self::AVAILABLE         => 'Available',
    ];
}
