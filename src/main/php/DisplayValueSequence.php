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

use ArrayIterator;
use Iterator;

class DisplayValueSequence implements DisplayValueInterface
{
    /** @var DisplayValueInterface[] */
    private $members = array();

    /** @var string */
    private $separator;

    public function __construct (string $separator = ' ')
    {
        $this->separator = $separator;
    }

    public function append (DisplayValueInterface $member) : void
    {
        $this->members[] = $member;
    }

    public function getIterator () : Iterator
    {
        return new ArrayIterator($this->members);
    }

    public function getSeparator () : string
    {
        return $this->separator;
    }

    public function isTranslatable () : bool
    {
        return false;
    }

    public function getValue () : string
    {
        $values = array();
        foreach ($this->members as $member) {
            $values[] = $member->getValue();
        }
        return implode($this->getSeparator(), $values);
    }
}
