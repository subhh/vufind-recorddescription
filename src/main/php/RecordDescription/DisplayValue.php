<?php

/*
 * This file is part of VuFind Record Description.
 *
 * VuFind Record Description is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * VuFind Record Description is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License
 * for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with VuFind Record Description. If not, see <https://www.gnu.org/licenses/>.
 *
 * @author    David Maus <david.maus@sub.uni-hamburg.de>
 * @copyright (c) 2023 by Staats- und Universitätsbibliothek Hamburg
 * @license   http://www.gnu.org/licenses/gpl.txt GNU General Public License v3 or higher
 */

declare(strict_types=1);

namespace SUBHH\VuFind\RecordDescription;

class DisplayValue implements DisplayValueInterface
{
    /** @var string */
    private $value;

    /** @var ?string */
    private $prefix;

    /** @var ?string */
    private $suffix;

    /** @var ?string */
    private $textdomain = null;

    /** @var bool */
    private $translatable = false;

    public function __construct (string $value)
    {
        $this->value = $value;
    }

    public function isTranslatable () : bool
    {
        return $this->translatable;
    }

    public function setIsTranslatable (bool $translatable) : void
    {
        $this->translatable = $translatable;
    }

    public function setTextDomain (string $textdomain = null) : void
    {
        $this->textdomain = $textdomain;
    }

    public function getTextDomain () : ?string
    {
        return $this->textdomain;
    }

    public function getValue () : string
    {
        return $this->value;
    }

    public function getSuffix () : ?string
    {
        return $this->suffix;
    }

    public function getPrefix () : ?string
    {
        return $this->prefix;
    }

    public function setSuffix (string $suffix) : void
    {
        $this->suffix = $suffix;
    }

    public function setPrefix (string $prefix) : void
    {
        $this->prefix = $prefix;
    }

    public function __toString () : string
    {
        return $this->getValue();
    }

    public static function newInstance (string $value, bool $isTranslatable = false) : DisplayValue
    {
        $value = new DisplayValue($value);
        $value->setIsTranslatable($isTranslatable);
        return $value;
    }

    /**
     * @param string[] $values
     * @return DisplayValue[]
     */
    public static function newInstances (array $values, bool $isTranslatable = false) : array
    {
        $instances = array();
        foreach ($values as $value) {
            $instances[] = static::newInstance($value, $isTranslatable);
        }
        return $instances;
    }
}
