<?php

/**
 * SCSSPHP
 *
 * @copyright 2012-2020 Leaf Corcoran
 *
 * @license http://opensource.org/licenses/MIT MIT
 *
 * @link http://scssphp.github.io/scssphp
 */

namespace ScssPhpRBE\ScssPhp\Visitor;

use ScssPhpRBE\ScssPhp\Value\SassBoolean;
use ScssPhpRBE\ScssPhp\Value\SassCalculation;
use ScssPhpRBE\ScssPhp\Value\SassColor;
use ScssPhpRBE\ScssPhp\Value\SassFunction;
use ScssPhpRBE\ScssPhp\Value\SassList;
use ScssPhpRBE\ScssPhp\Value\SassMap;
use ScssPhpRBE\ScssPhp\Value\SassNumber;
use ScssPhpRBE\ScssPhp\Value\SassString;

/**
 * An interface for visitors that traverse SassScript $values.
 *
 * @internal
 *
 * @template T
 */
interface ValueVisitor
{
    /**
     * @return T
     */
    public function visitBoolean(SassBoolean $value);

    /**
     * @return T
     */
    public function visitCalculation(SassCalculation $value);

    /**
     * @return T
     */
    public function visitColor(SassColor $value);

    /**
     * @return T
     */
    public function visitFunction(SassFunction $value);

    /**
     * @return T
     */
    public function visitList(SassList $value);

    /**
     * @return T
     */
    public function visitMap(SassMap $value);

    /**
     * @return T
     */
    public function visitNull();

    /**
     * @return T
     */
    public function visitNumber(SassNumber $value);

    /**
     * @return T
     */
    public function visitString(SassString $value);
}
