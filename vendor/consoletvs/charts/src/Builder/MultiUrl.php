<?php
/*
 * This file is part of consoletvs/charts.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Charts\Builder;

class MultiUrl extends Url
{
    /**
     * Create a new URL chart.
     *
     * @param string $url
     * @param string $type
     * @param string $library
     */
    public function __construct($url, $type = null, $library = null)
    {
        parent::__construct($url, $type, $library);

        $this->suffix = 'multiurl';
    }
}
