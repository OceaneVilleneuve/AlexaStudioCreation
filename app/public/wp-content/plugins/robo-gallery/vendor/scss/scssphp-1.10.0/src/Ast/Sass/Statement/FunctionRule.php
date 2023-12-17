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

namespace ScssPhpRBE\ScssPhp\Ast\Sass\Statement;

use ScssPhpRBE\ScssPhp\Ast\Sass\SassDeclaration;
use ScssPhpRBE\ScssPhp\SourceSpan\FileSpan;
use ScssPhpRBE\ScssPhp\Util\SpanUtil;
use ScssPhpRBE\ScssPhp\Visitor\StatementVisitor;

/**
 * A function declaration.
 *
 * This declares a function that's invoked using normal CSS function syntax.
 *
 * @internal
 */
final class FunctionRule extends CallableDeclaration implements SassDeclaration
{
    public function getNameSpan(): FileSpan
    {
        return SpanUtil::initialIdentifier(SpanUtil::withoutInitialAtRule($this->getSpan()));
    }

    public function accepts(StatementVisitor $visitor)
    {
        return $visitor->visitFunctionRule($this);
    }
}
