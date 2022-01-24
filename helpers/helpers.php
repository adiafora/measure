<?php

use Adiafora\Measure\Measure;

if (! function_exists('timeStart')) {

    /**
     * The starting point of the spent time and memory.
     *
     */
    function timeStart()
    {
        Measure::getInstance()
            ->start();
    }
}

if (! function_exists('timeDump')) {

    /**
     * Output of information about the time spent and memory.
     *
     * Output is possible only with a preliminary call to timeStart().
     *
     */
    function timeDump($symbols = 2)
    {
        $measure = Measure::getInstance();

        dump($measure->timeCalculate($symbols));
        dump($measure->memoryCalculate());
    }
}

if (! function_exists('timeDd')) {

    /**
     * Output time_dump() and stop.
     *
     */
    function timeDd($symbols = 2)
    {
        $measure = Measure::getInstance();

        dump($measure->timeCalculate($symbols));
        dd($measure->memoryCalculate());
    }
}



