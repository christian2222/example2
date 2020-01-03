<?php
namespace CM\Parser\Tests\Unit\Controller;

/**
 * Test case.
 */
class ParserControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \CM\Parser\Controller\ParserController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CM\Parser\Controller\ParserController::class)
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
    public function listActionFetchesAllParsersFromRepositoryAndAssignsThemToView()
    {

        $allParsers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $parserRepository = $this->getMockBuilder(\CM\Parser\Domain\Repository\ParserRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $parserRepository->expects(self::once())->method('findAll')->will(self::returnValue($allParsers));
        $this->inject($this->subject, 'parserRepository', $parserRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('parsers', $allParsers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenParserToView()
    {
        $parser = new \CM\Parser\Domain\Model\Parser();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('parser', $parser);

        $this->subject->showAction($parser);
    }
}
