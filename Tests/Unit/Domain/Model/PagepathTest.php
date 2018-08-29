<?php
namespace Webmatch\WmPagepath\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Sascha Löffler <sloeffler@webmatch.de>
 */
class PagepathTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Webmatch\WmPagepath\Domain\Model\Pagepath
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Webmatch\WmPagepath\Domain\Model\Pagepath();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
