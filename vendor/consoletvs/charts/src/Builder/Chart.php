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

use View;
use ConsoleTVs\Support\Helpers;
use ConsoleTVs\Charts\Traits\Setters;

/**
 * This is the chart class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Chart
{
    use Setters;

    public $id;
    public $customId;
    public $type;
    public $library;
    public $title;
    public $element_label;
    public $labels;
    public $values;
    public $colors;
    public $responsive;
    public $gauge_style;
    public $view;
    public $region;
    protected $suffix;
    public $container;
    public $credits;
    public $loader;
    public $loader_duration;
    public $loader_color;
    public $background_color;
    public $template;
    public $one_color;
    public $legend;
    public $x_axis_title;
    public $y_axis_title;
    public $script = '';
    public $html = '';
    public $export;

    /**
     * Create a new chart instance.
     *
     * @param string $type
     * @param string $library
     */
    public function __construct($type = null, $library = null)
    {
        // Set the default chart data
        $this->title = config('charts.default.title');
        $this->height = config('charts.default.height');
        $this->width = config('charts.default.width');
        $this->element_label = config('charts.default.element_label');
        $this->labels = [];
        $this->values = [];
        $this->colors = config('charts.default.colors');
        $this->suffix = '';
        $this->container = '';
        $this->gauge_style = 'left';
        $this->responsive = config('charts.default.responsive');
        $this->region = 'world';
        $this->background_color = config('charts.default.background_color');
        $this->credits = false; // Disables the library credits (not on all)
        $this->legend = config('charts.default.legend');
        $this->x_axis_title = config('charts.default.x_axis_title');
        $this->y_axis_title = config('charts.default.y_axis_title');

        // Setup the chart loader
        $this->loader = config('charts.default.loader.active');
        $this->loader_duration = config('charts.default.loader.duration');
        $this->loader_color = config('charts.default.loader.color');

        // Set the chart type
        $this->type = $type ? $type : config('charts.default.type');

        // Set the chart library
        $this->library = $library ? $library : config('charts.default.library');

        // Set the chart template
        $this->template = config('charts.default.template');

        $this->one_color = config('charts.default.one_color');
    }

    /**
     * Return and array of all the chart settings.
     *
     * @return array
     */
    public function settings()
    {
        return (array) $this;
    }

    /**
     * Render the chart.
     *
     * @return View|string
     */
    public function render()
    {
        $this->id = $this->container ? $this->container : $this->randomString();

        if (! $this->labels && ! $this->values) {
            $this->labels = [config('charts.default.empty_dataset_label')];
            $this->values = [config('charts.default.empty_dataset_value')];
        } elseif (! $this->values && $this->labels) {
            foreach ($this->labels as $l) {
                array_push($this->values, 0);
            }
        } elseif ($this->values && ! $this->labels) {
            $i = 0;
            foreach ($this->values as $v) {
                array_push($this->labels, "Unknown $i");
            }
        } elseif (count($this->values) > count($this->labels)) {
            $lb = count($this->labels);
            for ($i = 0; $i < (count($this->values) - $lb); $i++) {
                array_push($this->labels, "Unknown $i");
            }
        } elseif (count($this->values) < count($this->labels)) {
            $vl = count($this->values);
            for ($i = 0; $i < (count($this->labels) - $vl); $i++) {
                array_push($this->values, 0);
            }
        }

        if (! $this->colors) {
            $this->colors = ['#000000'];
            // Set the template colors
            $templates = config('charts.templates');
            if ($this->template && array_key_exists($this->template, $templates) && $colors = $templates[$this->template]) {
                $this->colors = $colors;
            }
        }

        $ds = $this->suffix == 'multi' ? count($this->datasets) : [];
        $cv = count($this->values);
        $cc = count($this->colors);

        if ($this->one_color) {
            $color = $this->colors[0];
            $this->colors = [];
            foreach ($this->values as $v) {
                array_push($this->colors, $color);
            }
        } elseif (($cc < $cv) || ($this->suffix == 'multi' && ($cc != $ds))) {
            if ($this->suffix == 'multi') {
                $cv = $ds;
            }

            if ($cc > $cv) {
                // There are more colors than values
                $this->colors = array_slice($this->colors, 0, $cv);
            } else {
                // There are less colors than values
                $i = 0;
                $max = count($this->colors);
                while (count($this->colors) < $cv) {
                    if ($i == $max) {
                        $i = 0;
                    }
                    array_push($this->colors, $this->colors[$i]);
                    $i++;
                }
            }
        }

        $view = $this->suffix ? "charts::{$this->library}.{$this->suffix}.{$this->type}" : "charts::{$this->library}.{$this->type}";
        $view = $this->view ?: $view;

        if (View::exists($view)) {
            return view($view)->withModel($this);
        }

        // There must be an error, let's show the error!
        $error_msg = 'Unknown chart library / type combination';
        $img_url = 'http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-error-icon.png';

        $error = "<div><div style='position: relative;";
        if (! $this->responsive) {
            $error .= $this->height ? 'height: '.$this->height.'px' : '';
            $error .= $this->width ? 'width: '.$this->width.'px' : '';
        }
        $error .= "'><center><div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'><img style='width: 75px; height: 75px;' src='$img_url'><br><br><b>$error_msg</b></div></center></div></div>";

        $this->html = $error;
        $this->script = "<script>console.error('{$error_msg}')</script>";

        return '';
    }

    /**
     * Return a random string.
     *
     * @param int $length
     *
     * @return string
     */
    protected function randomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    /**
     * Returns the chart script.
     *
     * @author Ariel Vallese <alariva@gmail.com>
     * @return string
     */
    public function script()
    {
        if ($this->script === '') {
            $this->split();
        }

        return $this->script;
    }

    /**
     * Returns the chart HTML.
     *
     * @author Ariel Vallese <alariva@gmail.com>
     * @return string
     */
    public function html()
    {
        if ($this->html === '') {
            $this->split();
        }

        return $this->html;
    }

    /**
     * Splits the assets.
     *
     * @author Ariel Vallese <alariva@gmail.com>
     * @return void
     */
    protected function split()
    {
        $render = $this->render();

        if ($this->html !== '' && $this->script !== '') {
            return;
        }

        $this->script = '<script'.Helpers::getBetween('<script', '</script>', $render).'</script>';
        $this->html = str_replace($this->script, '', $render);

        // $scriptEnds = strrpos($render, '</script>') + strlen('</script>');

        // $this->script = substr($render, 0, $scriptEnds);
        // $this->html = substr($render, $scriptEnds);
    }
}
