<?php
namespace icequeen\sm\ecc;

use Mdanter\Ecc\Math\GmpMathInterface;
use Mdanter\Ecc\Math\MathAdapterFactory;
use Mdanter\Ecc\Primitives\CurveParameters;

use icequeen\sm\ecc\NistCurve;

class EccFactory extends \Mdanter\Ecc\EccFactory{

    /**
     * Selects and creates the most appropriate adapter for the running environment.
     *
     * @param bool $debug [optional] Set to true to get a trace of all mathematical operations
     *
     * @throws \RuntimeException
     * @return GmpMathInterface
     */
    public static function getAdapter(bool $debug = false): GmpMathInterface
    {

        $adapter = MathAdapterFactory::getAdapter($debug);
        return $adapter;
    }

    /**
     * Returns a factory to create NIST Recommended curves and generators.
     *
     * @param  GmpMathInterface $adapter [optional] Defaults to the return value of EccFactory::getAdapter().
     * @return NistCurve
     */
    public static function getNistCurves(GmpMathInterface $adapter = null): NistCurve
    {
        $adapter = $adapter ?: self::getAdapter();
        // var_dump($adapter);
        return new NistCurve($adapter);
    }

    
}
