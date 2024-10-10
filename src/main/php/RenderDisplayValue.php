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

use Laminas\View\Helper\AbstractHelper;

final class RenderDisplayValue extends AbstractHelper
{
    public function __invoke (DisplayValueInterface $value) : ?string
    {
        $view = $this->getView();
        if ($view) {
            switch (get_class($value)) {
            case SearchLink::class:
                return $view->render('SearchLink', ['value' => $value]);
            case ExternalLink::class:
                return $view->render('ExternalLink', ['value' => $value]);
            case DisplayValueSequence::class:
                return $view->render('DisplayValueSequence', ['sequence' => $value]);
            case DisplayValue::class:
                return $view->render('DisplayValue', ['value' => $value]);
            default:
                return $view->render('DisplayValueInterface', ['value' => $value]);
            }
        }
        return null;
    }
}
