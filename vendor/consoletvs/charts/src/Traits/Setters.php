<?php
/*
 * This file is part of consoletvs/charts.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Charts\Traits;

/**
 * This is the setters trait for chart class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
trait Setters
{
    /**
     * Set the chart one color attribute.
     *
     * @param bool $one_color
     *
     * @return Chart
     */
    public function oneColor($one_color)
    {
        $this->one_color = $one_color;

        return $this;
    }

    /**
     * Set the chart color template.
     *
     * @param string $template
     *
     * @return Chart
     */
    public function template($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Set the chart division background color.
     *
     * @param string $background_color
     *
     * @return Chart
     */
    public function backgroundColor($background_color)
    {
        $this->background_color = $background_color;

        return $this;
    }

    /**
     * Set the loader for the chart.
     *
     * @param bool $loader
     *
     * @return Chart
     */
    public function loader($loader)
    {
        $this->loader = $loader;

        return $this;
    }

    /**
     * Set a custom loader time before showing the chart.
     *
     * @param int $loader_duration
     *
     * @return Chart
     */
    public function loaderDuration($loader_duration)
    {
        $this->loader_duration = $loader_duration;

        return $this;
    }

    /**
     * Set the loader color for the chart if the loader is enabled.
     *
     * @param string $loader_color
     *
     * @return Chart
     */
    public function loaderColor($loader_color)
    {
        $this->loader_color = $loader_color;

        return $this;
    }

    /**
     * Set a custom container to render the chart.
     *
     * @param string $division
     *
     * @return Chart
     */
    public function container($division)
    {
        $this->container = $division;

        return $this;
    }

    /**
     * Set the google geo region.
     *
     * @param string $region
     *
     * @return Chart
     */
    public function region($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Set gauge style.
     *
     * @param string $style
     *
     * @return Chart
     */
    public function gaugeStyle($style)
    {
        $this->gauge_style = $style;

        return $this;
    }

    /**
     * Set chart type.
     *
     * @param string $type
     *
     * @return Chart
     */
    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set chart library.
     *
     * @param string $library
     *
     * @return Chart
     */
    public function library($library)
    {
        $this->library = $library;

        return $this;
    }

    /**
     * Set chart labels.
     *
     * @param array $labels
     *
     * @return Chart
     */
    public function labels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * Set chart values.
     *
     * @param array $values
     *
     * @return Chart
     */
    public function values($values)
    {
        $this->values = $values;

        return $this;
    }

    /**
     * Set the chart element label.
     *
     * @param string $label
     *
     * @return Chart
     */
    public function elementLabel($label)
    {
        $this->element_label = $label;

        return $this;
    }

    /**
     * Set chart title.
     *
     * @param string $title
     *
     * @return Chart
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set chart credits enabled or Disable. Default credits enable.
     *
     * @param bool $credits
     *
     * @return Chart
     */
    public function credits($credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Set chart colors.
     *
     * @param array $colors
     *
     * @return Chart
     */
    public function colors($colors)
    {
        $this->colors = $colors;
        
        return $this;
    }

    /**
     * Set chart width.
     *
     * @param int $width
     *
     * @return Chart
     */
    public function width($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Set chart height.
     *
     * @param int $height
     *
     * @return Chart
     */
    public function height($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Set chart dimensions (width, height).
     *
     * @param int $width
     * @param int $height
     *
     * @return Chart
     */
    public function dimensions($width, $height)
    {
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    /**
     * Set if chart is responsive (will ignore dimensions if true).
     *
     * @param bool $responsive
     *
     * @return Chart
     */
    public function responsive($responsive)
    {
        $this->responsive = $responsive;

        return $this;
    }

    /**
     * Set a custom view to be used.
     *
     * @param string $view
     *
     * @return Chart
     */
    public function view($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Set whether a chart's legend is shown (where applicable).
     *
     * @param bool $legend
     *
     * @return Chart
     */
    public function legend($legend)
    {
        $this->legend = $legend;

        return $this;
    }

    /**
     * Set the title of a chart's x-axis (where applicable).
     *
     * @param bool $x_axis_title
     *
     * @return Chart
     */
    public function xAxisTitle($x_axis_title)
    {
        $this->x_axis_title = $x_axis_title;

        return $this;
    }

    /**
     * Set the title of a chart's y-axis (where applicable).
     *
     * @param bool $y_axis_title
     *
     * @return Chart
     */
    public function yAxisTitle($y_axis_title)
    {
        $this->y_axis_title = $y_axis_title;

        return $this;
    }

    /**
     * Determines if the chart should be exportable (Only if type is suported).
     *
     * @param bool $export
     *
     * @return Chart
     */
    public function export($export)
    {
        $this->export = $export;

        return $this;
    }
}
