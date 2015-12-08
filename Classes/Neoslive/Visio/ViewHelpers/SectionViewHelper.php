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
use TYPO3\Neos\Service\LinkingService;

/**
 * ViewHelper to find the closest document node to a given node
 */
class SectionViewHelper extends AbstractViewHelper
{

    /**
     * Disable escaping of tag based ViewHelpers so that the rendered tag is not htmlspecialchar'd
     *
     * @var boolean
     */
    protected $escapeOutput = FALSE;




    /**
     * @param string $identifier
     * @param string $asCss
     * @return NodeInterface
     */
    public function render($node,$asCss)
    {


       $css = " bg  bg-base ";


        switch ($node->getProperty('color')) {

            case '1':
                $css .= " sct-color-2 bb ";
                break;

            case '2':
                $css .= " bg-base-2  ";
                break;

            case '3':
                $css .= " bg-base-3  bb ";
                break;


            case '4':
                $css .= " bg-base-4  bb ";
                break;


            case '5':
                $css .= " bg-base-5  bb ";
                break;



            default:
                $css .= " bg-base-0 bb ";
                break;
        }



        if ($this->templateVariableContainer->exists($asCss)) $this->templateVariableContainer->remove($asCss);
        $this->templateVariableContainer->add($asCss, $css);


        return $this->renderChildren();
    }

}
