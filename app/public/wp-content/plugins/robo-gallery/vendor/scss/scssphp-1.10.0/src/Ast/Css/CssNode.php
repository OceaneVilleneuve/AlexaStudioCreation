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

namespace ScssPhpRBE\ScssPhp\Ast\Css;

use ScssPhpRBE\ScssPhp\Ast\AstNode;
use ScssPhpRBE\ScssPhp\Visitor\CssVisitor;

/**
 * A statement in a plain CSS syntax tree.
 *
 * @internal
 */
interface CssNode extends AstNode
{
    /**
     * Whether this was generated from the last node in a nested Sass tree that
     * got flattened during evaluation.
     */
    public function isGroupEnd(): bool;

    /**
     * Calls the appropriate visit method on $visitor.
     *
     * @template T
     *
     * @param CssVisitor<T> $visitor
     *
     * @return T
     */
    public function accept($visitor);
}
