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

use ScssPhpRBE\ScssPhp\Ast\Sass\Expression;
use ScssPhpRBE\ScssPhp\SourceSpan\FileSpan;
use ScssPhpRBE\ScssPhp\Visitor\ExpressionVisitor;

/**
 * A null literal.
 *
 * @internal
 */
final class NullExpression implements Expression
{
    /**
     * @var FileSpan
     * @readonly
     */
    private $span;

    public function __construct(FileSpan $span)
    {
        $this->span = $span;
    }

    public function getSpan(): FileSpan
    {
        return $this->span;
    }

    public function accepts(ExpressionVisitor $visitor)
    {
        return $visitor->visitNullExpression($this);
    }
}
