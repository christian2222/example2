<?php
namespace CM\Parser\Domain\Model;


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
 * Parser
 */
class Parser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * request
     * 
     * @var string
     */
    protected $request = '';

    /**
     * multiple requests
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CM\Parser\Domain\Model\Response>
     * @cascade remove
     */
    protected $pLink = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->pLink = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the request
     * 
     * @return string $request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets the request
     * 
     * @param string $request
     * @return void
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * Adds a Response
     * 
     * @param \CM\Parser\Domain\Model\Response $pLink
     * @return void
     */
    public function addPLink(\CM\Parser\Domain\Model\Response $pLink)
    {
        $this->pLink->attach($pLink);
    }

    /**
     * Removes a Response
     * 
     * @param \CM\Parser\Domain\Model\Response $pLinkToRemove The Response to be removed
     * @return void
     */
    public function removePLink(\CM\Parser\Domain\Model\Response $pLinkToRemove)
    {
        $this->pLink->detach($pLinkToRemove);
    }

    /**
     * Returns the pLink
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CM\Parser\Domain\Model\Response> $pLink
     */
    public function getPLink()
    {
        return $this->pLink;
    }

    /**
     * Sets the pLink
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CM\Parser\Domain\Model\Response> $pLink
     * @return void
     */
    public function setPLink(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $pLink)
    {
        $this->pLink = $pLink;
    }
}
