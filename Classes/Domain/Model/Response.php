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
 * Response
 */
class Response extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * result
     * 
     * @var string
     */
    protected $result = '';

    /**
     * rLink
     * 
     * @var
     */
    protected $rLink = null;

    /**
     * Returns the result
     * 
     * @return string $result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Sets the result
     * 
     * @param string $result
     * @return void
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Returns the rLink
     * 
     * @return  $rLink
     */
    public function getRLink()
    {
        return $this->rLink;
    }

    /**
     * Sets the rLink
     * 
     * @param string $rLink
     * @return void
     */
    public function setRLink($rLink)
    {
        $this->rLink = $rLink;
    }
}
