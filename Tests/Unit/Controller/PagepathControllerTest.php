<?php
namespace Webmatch\WmPagepath\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Sascha Löffler <sloeffler@webmatch.de>
 */
class PagepathControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Webmatch\WmPagepath\Controller\PagepathController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Webmatch\WmPagepath\Controller\PagepathController::class)
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
    public function listActionFetchesAllPagepathsFromRepositoryAndAssignsThemToView()
    {

        $allPagepaths = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $pagepathRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $pagepathRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPagepaths));
        $this->inject($this->subject, 'pagepathRepository', $pagepathRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('pagepaths', $allPagepaths);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
