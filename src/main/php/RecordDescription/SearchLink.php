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

class SearchLink extends DisplayValue
{
    /** @var ?string */
    private $searchTerm;

    /** @var string */
    private $searchType = 'AllFields';

    /** @var ?string */
    private $searchTermQuote = null;

    public function getSearchTerm () : string
    {
        if (is_string($this->searchTerm)) {
            if ($this->searchTermQuote) {
                return $this->searchTermQuote . addcslashes($this->searchTerm, $this->searchTermQuote) . $this->searchTermQuote;
            }
            return $this->searchTerm;
        }
        return $this->getValue();
    }

    public function getSearchType () : string
    {
        return $this->searchType;
    }

    public function setSearchTerm (string $searchTerm) : void
    {
        $this->searchTerm = $searchTerm;
    }

    public function setSearchType (string $searchType) : void
    {
        $this->searchType = $searchType;
    }

    public function setSearchTermQuote (string $searchTermQuote = null) : void
    {
        $this->searchTermQuote = $searchTermQuote;
    }

}
