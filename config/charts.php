<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default settings for charts.
    |--------------------------------------------------------------------------
    */

    'default' => [
        'type' => 'line', // The default chart type.
        'library' => 'material', // The default chart library.
        'element_label' => 'Element', // The default chart element label.
        'empty_dataset_label' => 'No Data Set',
        'empty_dataset_value' => 0,
        'title' => 'My Cool Chart', // Default chart title.
        'height' => 400, // 0 Means it will take 100% of the division height.
        'width' => 0, // 0 Means it will take 100% of the division width.
        'responsive' => false, // Not recommended since all libraries have diferent sizes.
        'background_color' => 'inherit', // The chart division background color.
        'colors' => [], // Default chart colors if using no template is set.
        'one_color' => false, // Only use the first color in all values.
        'template' => 'material', // The default chart color template.
        'legend' => true, // Whether to enable the chart legend (where applicable).
        'x_axis_title' => false, // The title of the x-axis
        'y_axis_title' => null, // The title of the y-axis (When set to null will use element_label value).
        'loader' => [
            'active' => true, // Determines the if loader is active by default.
            'duration' => 500, // In milliseconds.
            'color' => '#000000', // Determines the default loader color.
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | All the color templates available for the charts.
    |--------------------------------------------------------------------------
    */
    'templates' => [
        'material' => [
            '#2196F3', '#F44336', '#FFC107',
        ],
        'red-material' => [
            '#B71C1C', '#F44336', '#E57373',
        ],
        'indigo-material' => [
            '#1A237E', '#3F51B5', '#7986CB',
        ],
        'blue-material' => [
            '#0D47A1', '#2196F3', '#64B5F6',
        ],
        'teal-material' => [
            '#004D40', '#009688', '#4DB6AC',
        ],
        'green-material' => [
            '#1B5E20', '#4CAF50', '#81C784',
        ],
        'yellow-material' => [
            '#F57F17', '#FFEB3B', '#FFF176',
        ],
        'orange-material' => [
            '#E65100', '#FF9800', '#FFB74D',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Assets required by the libraries.
    |--------------------------------------------------------------------------
    */

    'assets' => [
        'global' => [
            'scripts' => [
                'js/charts/jquery-3.1.1.min.js',
            ],
        ],

        'canvas-gauges' => [
            'scripts' => [
                'js/charts/gauge-2.1.2.min.js',
            ],
        ],

        'chartist' => [
            'scripts' => [
                'js/charts/chartist-0.10.1.min.js',
            ],
            'styles' => [
                'js/charts/chartist-0.10.1.min.css',
            ],
        ],

        'chartjs' => [
            'scripts' => [
                'js/charts/Chart-2.4.0.min.js',
            ],
        ],

        'fusioncharts' => [
            'scripts' => [
                'js/charts/fusioncharts.js',
                'js/charts/fusioncharts.theme.fint.js',
            ],
        ],

        'google' => [
            'scripts' => [
                'js/charts/jsapi',
                'js/charts/loader.js',
                "google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})",
            ],
        ],

        'highcharts' => [
            'styles' => [
                // The following CSS is not added due to color compatibility errors.
                // 'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/css/highcharts.css',
            ],
            'scripts' => [
                'js/charts/highcharts-5.0.7.js',
                'js/charts/offline-exporting-5.0.7.js',
                'js/charts/map-5.0.7.js',
                'js/charts/data-5.0.7.js',
                'js/charts/world.js',
            ],
        ],

        'justgage' => [
            'scripts' => [
                'js/charts/raphael-2.2.6.min.js',
                'js/charts/justgage-1.2.2.min.js',
            ],
        ],

        'morris' => [
            'styles' => [
                'js/charts/morris-0.5.1.css',
            ],
            'scripts' => [
                'js/charts/raphael-2.2.6i.min.js',
                'js/charts/morris-0.5.1.min.js',
            ],
        ],

        'plottablejs' => [
            'scripts' => [
                'js/charts/d3.min.js',
                'js/charts/plottable-2.8.0.min.js',
            ],
            'styles' => [
                'js/charts/plottable-2.2.0.css',
            ],
        ],

        'progressbarjs' => [
            'scripts' => [
                'js/charts/progressbar-1.0.1.min.js',
            ],
        ],

        'c3' => [
            'scripts' => [
                'js/charts/d3-3.5.5.min.js',
                'js/charts/c3.min.js',
            ],
            'styles' => [
                'js/charts/c3.min.css',
            ],
        ],

        'echarts' => [
            'scripts' => [
                'js/charts/echarts-3.6.2.min.js',
            ],
        ],

        'amcharts' => [
            'scripts' => [
                'js/charts/amcharts-3.21.2.js',
                'js/charts/serial-3.21.2.js',
                'js/charts/export-3.21.2.min.js',
                'js/charts/light-3.21.2.js',
            ],
            'styles' => [
                'js/charts/export-3.21.2.css',
            ],
        ],
    ],
];
