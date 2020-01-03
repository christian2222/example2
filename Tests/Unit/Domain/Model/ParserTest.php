<?php
namespace CM\Parser\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ParserTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \CM\Parser\Domain\Model\Parser
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CM\Parser\Domain\Model\Parser();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getRequestReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRequest()
        );
    }

    /**
     * @test
     */
    public function setRequestForStringSetsRequest()
    {
        $this->subject->setRequest('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'request',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPLinkReturnsInitialValueForResponse()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPLink()
        );
    }

    /**
     * @test
     */
    public function setPLinkForObjectStorageContainingResponseSetsPLink()
    {
        $pLink = new \CM\Parser\Domain\Model\Response();
        $objectStorageHoldingExactlyOnePLink = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePLink->attach($pLink);
        $this->subject->setPLink($objectStorageHoldingExactlyOnePLink);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePLink,
            'pLink',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPLinkToObjectStorageHoldingPLink()
    {
        $pLink = new \CM\Parser\Domain\Model\Response();
        $pLinkObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $pLinkObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($pLink));
        $this->inject($this->subject, 'pLink', $pLinkObjectStorageMock);

        $this->subject->addPLink($pLink);
    }

    /**
     * @test
     */
    public function removePLinkFromObjectStorageHoldingPLink()
    {
        $pLink = new \CM\Parser\Domain\Model\Response();
        $pLinkObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $pLinkObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($pLink));
        $this->inject($this->subject, 'pLink', $pLinkObjectStorageMock);

        $this->subject->removePLink($pLink);
    }
}
