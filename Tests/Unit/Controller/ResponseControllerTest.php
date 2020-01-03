<?php
namespace CM\Parser\Tests\Unit\Controller;

/**
 * Test case.
 */
class ResponseControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \CM\Parser\Controller\ResponseController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CM\Parser\Controller\ResponseController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllResponsesFromRepositoryAndAssignsThemToView()
    {

        $allResponses = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $responseRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $responseRepository->expects(self::once())->method('findAll')->will(self::returnValue($allResponses));
        $this->inject($this->subject, 'responseRepository', $responseRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('responses', $allResponses);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenResponseToView()
    {
        $response = new \CM\Parser\Domain\Model\Response();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('response', $response);

        $this->subject->showAction($response);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenResponseToResponseRepository()
    {
        $response = new \CM\Parser\Domain\Model\Response();

        $responseRepository = $this->getMockBuilder(\::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $responseRepository->expects(self::once())->method('add')->with($response);
        $this->inject($this->subject, 'responseRepository', $responseRepository);

        $this->subject->createAction($response);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenResponseToView()
    {
        $response = new \CM\Parser\Domain\Model\Response();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('response', $response);

        $this->subject->editAction($response);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenResponseInResponseRepository()
    {
        $response = new \CM\Parser\Domain\Model\Response();

        $responseRepository = $this->getMockBuilder(\::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $responseRepository->expects(self::once())->method('update')->with($response);
        $this->inject($this->subject, 'responseRepository', $responseRepository);

        $this->subject->updateAction($response);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenResponseFromResponseRepository()
    {
        $response = new \CM\Parser\Domain\Model\Response();

        $responseRepository = $this->getMockBuilder(\::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $responseRepository->expects(self::once())->method('remove')->with($response);
        $this->inject($this->subject, 'responseRepository', $responseRepository);

        $this->subject->deleteAction($response);
    }
}
