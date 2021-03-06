<?php

namespace BetterReflection\SourceLocator;

use BetterReflection\Identifier\Identifier;

/**
 * This source locator simply parses the string given in the constructor as
 * valid PHP.
 *
 * Note that this source locator does NOT specify a filename, because we did
 * not load it from a file, so it will be null if you use this locator.
 */
class StringSourceLocator implements SourceLocator
{
    /**
     * @var string
     */
    private $source;

    public function __construct($source)
    {
        $this->source = (string)$source;

        if (empty($this->source)) {
            // Whilst an empty string is still "valid" PHP code, there is no
            // point in us even trying to parse it because we won't find what
            // we are looking for, therefore this throws an exception
            throw new Exception\EmptyPhpSourceCode(
                'Source code string was empty'
            );
        }
    }

    /**
     * @param Identifier $identifier
     * @return LocatedSource
     */
    public function __invoke(Identifier $identifier)
    {
        // @todo https://github.com/Roave/BetterReflection/issues/43
        return new LocatedSource($this->source, null);
    }
}
