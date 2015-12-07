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
class SpliceSliderViewHelper extends AbstractViewHelper
{

    /**
     * Disable escaping of tag based ViewHelpers so that the rendered tag is not htmlspecialchar'd
     *
     * @var boolean
     */
    protected $escapeOutput = FALSE;

    /**
     * @param string $delim
     * @param int $perrow
     * @return string
     */
    public function render($delim, $perrow)
    {


        $input = preg_split("/(" . $delim . ")/", $this->renderChildren());


        $data = array();
        for ($i = 0; $i < $perrow; $i++) {
            $data[$i] = array();
        }

        $counter = 0;
        $row = 0;
        foreach ($input as $key => $item) {

            if (trim($item) != '') {

                if ($counter % $perrow == 0 && $counter > 0) $row++;
                $data[$row][] = $item;

                $counter++;
            }


        }

        $html = '';


        foreach ($data as $k => $v) {
            if (count($v) > 0) {
                $html .= $delim;
                $html .= "\n";
                if ($k == 0) {
                    $html .= '<div class="item active">';
                } else {
                    $html .= '<div class="item">';
                }
                $html .= "\n";
                $html .= ' <div class="row">';
                foreach ($v as $key => $c) {
                    $html .= $c;
                    $html .= "\n";
                }
                $html .= "\n";
                $html .= ' </div>';
                $html .= "\n";
                $html .= '</div>';
            }
        }


        return $html;

    }

}
