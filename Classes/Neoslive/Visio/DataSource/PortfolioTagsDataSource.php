<?php
namespace Neoslive\Visio\DataSource;

use TYPO3\Neos\Service\DataSource\AbstractDataSource;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\Eel\FlowQuery\FlowQuery;

class PortfolioTagsDataSource extends AbstractDataSource {

    /**
     * @var string
     */
    static protected $identifier = 'portfolio-tags';

    /**
     * Get data
     *
     * @param NodeInterface $node The node that is currently edited (optional)
     * @param array $arguments Additional arguments (key / value)
     * @return array JSON serializable data
     */
    public function getData(NodeInterface $node = NULL, array $arguments)
    {


        $tags = array();

        $flowQuery = new FlowQuery(array($node));
        $query = $flowQuery->parent()->children('[instanceof Neoslive.Visio:Tag]');

        foreach ($query as $tag) {
            $tags[$tag->getIdentifier()] = array('label' => $tag->getProperty('title'),  'icon' => 'icon-tag');
        }


        return $tags;



    }
}