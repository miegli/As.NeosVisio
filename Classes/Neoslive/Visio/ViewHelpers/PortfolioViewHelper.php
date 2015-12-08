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
class PortfolioViewHelper extends AbstractViewHelper
{

    /**
     * Disable escaping of tag based ViewHelpers so that the rendered tag is not htmlspecialchar'd
     *
     * @var boolean
     */
    protected $escapeOutput = FALSE;

    /**
     * @param string $section
     * @return string
     */
    public function render($section)
    {

        if ($section == 'javascript') return $this->renderJavascript();

    }


    /**
     * @return string
     */
    public function renderJavascript()
    {

$html = '<script>'."\n";
$html .= '                                                                           '."\n";
$html .= '                                                                           '."\n";
$html .= '                                                                           '."\n";
$html .= '            function init_portfolio() {  '."\n";
$html .= '                    \'use strict\''."\n";
$html .= '                    // init cubeportfolio '."\n";
$html .= '                    $(\'#grid-container\').cubeportfolio({ '."\n";
$html .= '                filters: \'#filters-container\', '."\n";
$html .= '                loadMore: \'#loadMore-container\', '."\n";
$html .= '                loadMoreAction: \'click\', '."\n";
$html .= '                layoutMode: \'grid\', '."\n";
$html .= '                defaultFilter: \'*\', '."\n";
$html .= '                animationType: \'scaleSides\', '."\n";
$html .= '                gapHorizontal: 0, '."\n";
$html .= '                gapVertical: 0, '."\n";
$html .= '                gridAdjustment: \'responsive\', '."\n";
$html .= '                 mediaQueries: [{ '."\n";
$html .= '                        width: 1100, '."\n";
$html .= '                    cols: 2 '."\n";
$html .= '                }, { '."\n";
$html .= '                        width: 800, '."\n";
$html .= '                    cols: 2 '."\n";
$html .= '                }, { '."\n";
$html .= '                        width: 500, '."\n";
$html .= '                    cols: 2 '."\n";
$html .= '                }, { '."\n";
$html .= '                        width: 320, '."\n";
$html .= '                    cols: 1 '."\n";
$html .= '                }], '."\n";
$html .= '                caption: \'zoom\', '."\n";
$html .= '                displayType: \'lazyLoading\', '."\n";
$html .= '                displayTypeSpeed: 400, '."\n";
$html .= '                // singlePage popup '."\n";
$html .= '                singlePageDelegate: \'.cbp-singlePage\', '."\n";
$html .= '                singlePageDeeplinking: true, '."\n";
$html .= '                singlePageStickyNavigation: true, '."\n";
$html .= '                singlePageCounter: \'<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>\', '."\n";
$html .= '                singlePageCallback: function(url, element) { '."\n";
$html .= '                        // to update singlePage content use the following method: this.updateSinglePage(yourContent) '."\n";
$html .= '                        '."\n";
$html .= '                        var t = this; '."\n";
$html .= '                        $.ajax({ '."\n";
$html .= '                            url: url, '."\n";
$html .= '                            type: \'GET\', '."\n";
$html .= '                            dataType: \'html\', '."\n";
$html .= '                            timeout: 10000 '."\n";
$html .= '                        }) '."\n";
$html .= '                        .done(function(result) { '."\n";
$html .= '                            t.updateSinglePage(result); '."\n";
$html .= '                        }) '."\n";
$html .= '                        .fail(function() { '."\n";
$html .= '                            t.updateSinglePage(\'AJAX Error! Please refresh the page!\'); '."\n";
$html .= '                        }); '."\n";
$html .= '                }, '."\n";
$html .= '            }); '."\n";
$html .= '                       }                                                    '."\n";
$html .= '                       init_portfolio();                                                    '."\n";
$html .= '    document.addEventListener(\'Neos.PageLoaded\', function(event) {                                                                         '."\n";
$html .= '               init_portfolio();                                                                '."\n";
$html .= '     }, false);                                                             '."\n";
$html .= '                                                                           '."\n";
$html .= '</script>'."\n";

        return $html;

    }

}
