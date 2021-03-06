<?php

namespace BetterReflection\SourceLocator;

/**
 * {@inheritDoc}
 */
class EvaledLocatedSource extends LocatedSource
{
    /**
     * @param string $source
     */
    public function __construct($source)
    {
        parent::__construct($source, null);
    }

    /**
     * {@inheritDoc}
     */
    public function isEvaled()
    {
        return true;
    }
}
