<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types;

/**
 * Represents an array type as described in the PSR-5, the PHPDoc Standard.
 *
 * An array can be represented in two forms:
 *
 * 1. Untyped (`array`), where the key and value type is unknown and hence classified as 'Mixed_'.
 * 2. Types (`string[]`), where the value type is provided by preceding an opening and closing square bracket with a
 *    type name.
 */
final class Array_ extends AbstractList
{
    /**
     * Returns a rendered output of the Type as it would be used in a DocBlock.
     */
    public function __toString() : string
    {
        if ($this->keyType) {
            return 'array<' . $this->keyType . ',' . $this->valueType . '>';
        }

        if ($this->valueType instanceof Mixed_) {
            return 'array';
        }

        if ($this->valueType instanceof Compound) {
            return '(' . $this->valueType . ')[]';
        }

        return $this->valueType . '[]';
    }
}
