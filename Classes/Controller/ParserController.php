<?php
namespace CM\Parser\Controller;


/***
 *
 * This file is part of the "My Parser" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * ParserController
 */
class ParserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * parserRepository
     * 
     * @var \CM\Parser\Domain\Repository\ParserRepository
     * @inject
     */
    protected $parserRepository = null;

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $parsers = $this->parserRepository->findAll();
        $this->view->assign('parsers', $parsers);
    }

    /**
     * action show
     * 
     * @param \CM\Parser\Domain\Model\Parser $parser
     * @return void
     */
    public function showAction(\CM\Parser\Domain\Model\Parser $parser)
    {
        $this->view->assign('parser', $parser);
    }
}
