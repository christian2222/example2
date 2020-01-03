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
 * ResponseController
 */
class ResponseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $responses = $this->responseRepository->findAll();
        $this->view->assign('responses', $responses);
    }

    /**
     * action show
     * 
     * @param \CM\Parser\Domain\Model\Response $response
     * @return void
     */
    public function showAction(\CM\Parser\Domain\Model\Response $response)
    {
        $this->view->assign('response', $response);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     * 
     * @param \CM\Parser\Domain\Model\Response $newResponse
     * @return void
     */
    public function createAction(\CM\Parser\Domain\Model\Response $newResponse)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->responseRepository->add($newResponse);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \CM\Parser\Domain\Model\Response $response
     * @ignorevalidation $response
     * @return void
     */
    public function editAction(\CM\Parser\Domain\Model\Response $response)
    {
        $this->view->assign('response', $response);
    }

    /**
     * action update
     * 
     * @param \CM\Parser\Domain\Model\Response $response
     * @return void
     */
    public function updateAction(\CM\Parser\Domain\Model\Response $response)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->responseRepository->update($response);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \CM\Parser\Domain\Model\Response $response
     * @return void
     */
    public function deleteAction(\CM\Parser\Domain\Model\Response $response)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->responseRepository->remove($response);
        $this->redirect('list');
    }
}
