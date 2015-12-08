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
class GetButtonViewHelper extends AbstractViewHelper
{

    /**
     * Disable escaping of tag based ViewHelpers so that the rendered tag is not htmlspecialchar'd
     *
     * @var boolean
     */
    protected $escapeOutput = FALSE;


    /**
     * @Flow\Inject
     * @var LinkingService
     */
    protected $linkingService;


    /**
     * @param string $identifier
     * @param string $asUrl
     * @param string $asCss
     * @param string $style
     * @param bool $backend
     * @return NodeInterface
     */
    public function render($identifier, $asUrl, $asCss, $style, $backend = false)
    {


        $url = $identifier;
        $css = "";


        if (substr($identifier, 0, 4) == 'http') {
            if ($backend == false) $css = "ext-source";
        } else {
            $css = "";
        }

        if (substr($identifier, 0, 1) == '#') {
            if ($backend == false) $css = "scroll-me";
        }


        if ($backend) $url = "javascript:void(0);";

        switch ($style) {

            case 'slim':
                $css .= " btn btn-lg btn-b-base-5 ";
                break;

            case 'slimInverted':
                $css .= " btn btn-xl btn-white  ";
                break;

            default:
                $css .= " btn-a btn-lg btn-1 btn-1a fa-long-arrow-right ";
                break;
        }




        if ($this->templateVariableContainer->exists($asUrl)) $this->templateVariableContainer->remove($asUrl);
        $this->templateVariableContainer->add($asUrl, $url);

        if ($this->templateVariableContainer->exists($asCss)) $this->templateVariableContainer->remove($asCss);
        $this->templateVariableContainer->add($asCss, $css);


        return $this->renderChildren();
    }

}
