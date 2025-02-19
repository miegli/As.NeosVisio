<?php
namespace Neoslive\Visio\ViewHelpers;

/*
 * This file is part of the TYPO3.Neos package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\Eel\FlowQuery\FlowQuery;
/**
 * ViewHelper to find the closest document node to a given node
 */
class ChildrenViewHelper extends AbstractViewHelper
{

    /**
     * Disable escaping of tag based ViewHelpers so that the rendered tag is not htmlspecialchar'd
     *
     * @var boolean
     */
    protected $escapeOutput = FALSE;

    /**
     * @param NodeInterface $node
     * @param string $as
     * @return NodeInterface
     */
    public function render(NodeInterface $node,$as,$instanceof)
    {
        $flowQuery = new FlowQuery(array($node));
        $query = $flowQuery->children('[instanceof '.$instanceof.']')->get();

        if ($this->templateVariableContainer->exists($as))  $this->templateVariableContainer->remove($as);
            $this->templateVariableContainer->add($as, $query);


        return $this->renderChildren();
    }

}
