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

use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\BinaryOperationExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\BooleanExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\CalculationExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\ColorExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\FunctionExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\IfExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\InterpolatedFunctionExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\ListExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\MapExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\NullExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\NumberExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\ParenthesizedExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\SelectorExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\StringExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\UnaryOperationExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\ValueExpression;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression\VariableExpression;

/**
 * An interface for visitors that traverse SassScript expressions.
 *
 * @internal
 *
 * @template T
 */
interface ExpressionVisitor
{
    /**
     * @return T
     */
    public function visitBinaryOperationExpression(BinaryOperationExpression $node);

    /**
     * @return T
     */
    public function visitBooleanExpression(BooleanExpression $node);

    /**
     * @return T
     */
    public function visitCalculationExpression(CalculationExpression $node);

    /**
     * @return T
     */
    public function visitColorExpression(ColorExpression $node);

    /**
     * @return T
     */
    public function visitInterpolatedFunctionExpression(InterpolatedFunctionExpression $node);

    /**
     * @return T
     */
    public function visitFunctionExpression(FunctionExpression $node);

    /**
     * @return T
     */
    public function visitIfExpression(IfExpression $node);

    /**
     * @return T
     */
    public function visitListExpression(ListExpression $node);

    /**
     * @return T
     */
    public function visitMapExpression(MapExpression $node);

    /**
     * @return T
     */
    public function visitNullExpression(NullExpression $node);

    /**
     * @return T
     */
    public function visitNumberExpression(NumberExpression $node);

    /**
     * @return T
     */
    public function visitParenthesizedExpression(ParenthesizedExpression $node);

    /**
     * @return T
     */
    public function visitSelectorExpression(SelectorExpression $node);

    /**
     * @return T
     */
    public function visitStringExpression(StringExpression $node);

    /**
     * @return T
     */
    public function visitUnaryOperationExpression(UnaryOperationExpression $node);

    /**
     * @return T
     */
    public function visitValueExpression(ValueExpression $node);

    /**
     * @return T
     */
    public function visitVariableExpression(VariableExpression $node);
}
