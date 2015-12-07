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
class SpliceAccordeonViewHelper extends AbstractViewHelper
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


$html .= '        <div class="panel">';
$html .= '               <div class="panel-heading">';
$html .= '                   <h4 class="panel-title">';
$html .= '                       <a data-toggle="collapse" data-parent="#accordionFour" href="#collapse4a">';
$html .= '       Lorem ipsum dolor sit amet';
$html .= '   </a>';
$html .= '                   </h4>';
$html .= '               </div>';
$html .= '               <div id="collapse4a" class="panel-collapse collapse">';
$html .= '                   <div class="panel-body">';
$html .= '                       <div class="row">';
$html .= '                           <div class="col-md-12">';
$html .= '                                                  ';
$html .= '                           </div>';
$html .= '                       </div>';
$html .= '                   </div>';
$html .= '               </div>';
$html .= '           </div>';


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
                foreach ($v as $key => $c) {
                    $html .= $c;
                    $html .= "\n";
                }
                $html .= "\n";
                $html .= '</div>';
            }
        }


        return $html;

    }

}
