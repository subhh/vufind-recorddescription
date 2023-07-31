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

final class ExternalLink extends DisplayValue
{
    /** @var string */
    private $linkTarget;

    /** @var ?string */
    private $linkLabel;

    public function __construct (string $linkTarget)
    {
        parent::__construct($linkTarget);
        $this->linkTarget = $linkTarget;
    }

    public function getLinkTarget () : string
    {
        return $this->linkTarget;
    }

    public function getLinkLabel () : ?string
    {
        return $this->linkLabel;
    }

    public function setLinkLabel (string $linkLabel) : void
    {
        $this->linkLabel = $linkLabel;
    }
}
