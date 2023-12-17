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

namespace ScssPhpRBE\ScssPhp\Ast\Sass\Expression;

use ScssPhpRBE\ScssPhp\Ast\Sass\ArgumentInvocation;
use ScssPhpRBE\ScssPhp\Ast\Sass\CallableInvocation;
use ScssPhpRBE\ScssPhp\Ast\Sass\Expression;
use ScssPhpRBE\ScssPhp\SourceSpan\FileSpan;
use ScssPhpRBE\ScssPhp\Visitor\ExpressionVisitor;

/**
 * A ternary expression.
 *
 * This is defined as a separate syntactic construct rather than a normal
 * function because only one of the `$if-true` and `$if-false` arguments are
 * evaluated.
 *
 * @internal
 */
final class IfExpression implements Expression, CallableInvocation
{
    /**
     * The arguments passed to `if()`.
     *
     * @var ArgumentInvocation
     * @readonly
     */
    private $arguments;

    /**
     * @var FileSpan
     * @readonly
     */
    private $span;

    public function __construct(ArgumentInvocation $arguments, FileSpan $span)
    {
        $this->span = $span;
        $this->arguments = $arguments;
    }

    public function getArguments(): ArgumentInvocation
    {
        return $this->arguments;
    }

    public function getSpan(): FileSpan
    {
        return $this->span;
    }

    public function accepts(ExpressionVisitor $visitor)
    {
        return $visitor->visitIfExpression($this);
    }
}
