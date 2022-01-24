<?php

namespace Adiafora\Measure;

class Measure
{
    /**
     * @var Measure|null
     */
    protected static ?Measure $instance = null;

    /**
     * @var string
     */
    protected string $microtime;

    /**
     * @var int
     */
    protected int $memoryUsage;

    protected function __construct()
    {
    }

    /**
     * Getting an object.
     * Singleton.
     *
     * @return Measure|null
     */
    public static function getInstance(): ?Measure
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * The starting point of the spent time and memory.
     *
     */
    public function start()
    {
        $this->memoryUsage = memory_get_usage();
        $this->microtime   = microtime(1);
    }

    /**
     * Calculation of the elapsed time.
     *
     * @param int $symbols
     *
     * @return string
     */
    public function timeCalculate(int $symbols = 2): string
    {
        return round(microtime(1) - $this->microtime, $symbols) . ' sec.';
    }

    /**
     * Calculation of spent memory.
     *
     * @return string
     */
    public function memoryCalculate(): string
    {
        return $this->bitesConvertMeasure(memory_get_usage() - $this->memoryUsage);
    }

    /**
     * Convert bytes to more readable units.
     *
     * @param int $bytes .
     *
     * @return string
     */
    protected function bitesConvertMeasure(int $bytes): string
    {
        $unit = ['b', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb'];
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . ' ' . $unit[$i];
    }
}