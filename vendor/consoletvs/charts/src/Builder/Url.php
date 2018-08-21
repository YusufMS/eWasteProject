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

class Url extends Chart
{
    public $url;
    public $data;
    public $method;
    public $values_name;
    public $labels_name;
    public $loading_text;

    /**
     * Create a new URL chart.
     *
     * @param string $url
     * @param string $type
     * @param string $library
     */
    public function __construct($url, $type = null, $library = null)
    {
        parent::__construct($type, $library);

        $this->url($url);
        $this->method('GET');
        $this->data([]);
        $this->valuesName('values');
        $this->labelsName('labels');
        $this->loadingText('Loading...');

        $this->suffix = 'url';
    }

    /**
     * Sets the url.
     *
     * @param  string $url
     * @return Url
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the HTTP method.
     *
     * @param  string $method
     * @return Url
     */
    public function method($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Set the HTTP data to be sent with the request.
     *
     * @param  array $data
     * @return Url
     */
    public function data($data)
    {
        $this->data = json_encode($data);

        return $this;
    }

    /**
     * Set the values name for the JSON object.
     *
     * @param  string $values_name
     * @return Url
     */
    public function valuesName($values_name)
    {
        $this->values_name = $values_name;

        return $this;
    }

    /**
     * Set the label name for the JSON object.
     *
     * @param  string $labels_name
     * @return Url
     */
    public function labelsName($labels_name)
    {
        $this->labels_name = $labels_name;

        return $this;
    }

    /**
     * Set the loading text if possible.
     *
     * @param  string $loading_text
     * @return Url
     */
    public function loadingText($loading_text)
    {
        $this->loading_text = $loading_text;

        return $this;
    }
}
