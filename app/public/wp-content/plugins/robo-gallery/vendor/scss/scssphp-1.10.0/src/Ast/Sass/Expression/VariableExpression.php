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
use ScssPhpRBE\ScssPhp\Ast\Sass\SassReference;
use ScssPhpRBE\ScssPhp\SourceSpan\FileSpan;
use ScssPhpRBE\ScssPhp\Util\SpanUtil;
use ScssPhpRBE\ScssPhp\Visitor\ExpressionVisitor;

/**
 * A Sass variable.
 *
 * @internal
 */
final class VariableExpression implements Expression, SassReference
{
    /**
     * The name of this variable, with underscores converted to hyphens.
     *
     * @var string
     * @readonly
     */
    private $name;

    /**
     * The namespace of the variable being referenced, or `null` if it's
     * referenced without a namespace.
     *
     * @var string|null
     * @readonly
     */
    private $namespace;

    /**
     * @var FileSpan
     * @readonly
     */
    private $span;

    public function __construct(string $name, FileSpan $span, ?string $namespace = null)
    {
        $this->span = $span;
        $this->name = $name;
        $this->namespace = $namespace;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    public function getSpan(): FileSpan
    {
        return $this->span;
    }

    public function getNameSpan(): FileSpan
    {
        if ($this->namespace === null) {
            return $this->span;
        }

        return SpanUtil::withoutNamespace($this->span);
    }

    public function getNamespaceSpan(): ?FileSpan
    {
        if ($this->namespace === null) {
            return null;
        }

        return SpanUtil::initialIdentifier($this->span);
    }

    public function accepts(ExpressionVisitor $visitor)
    {
        return $visitor->visitVariableExpression($this);
    }
}
