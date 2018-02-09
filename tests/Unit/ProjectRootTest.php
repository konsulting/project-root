<?php

namespace Konsulting\Tests\Unit;

use Konsulting\ProjectRoot;
use PHPUnit\Framework\TestCase;

class ProjectRootTest extends TestCase
{
    /** @test * */
    public function it_returns_the_right_path_when_developing_the_package()
    {
        $this->assertEquals(
            '/User/Me/Code/package-root',
            ProjectRoot::forPackage('package-root')->resolve('/User/Me/Code/package-root/src')
        );
    }

    /** @test * */
    public function it_returns_the_right_path_in_an_application()
    {
        $this->assertEquals(
            '/User/Me/Code/app',
            ProjectRoot::forPackage('package-root')->resolve('/User/Me/Code/app/vendor/konsulting/package-root/src')
        );
    }

    /**
     * @test
     * @expectedException \Konsulting\PackageDirectoryNotFound
     **/
    public function it_gets_upset_if_you_try_to_locate_a_package_package_dir_that_doesnt_exist()
    {
        $this->assertEquals(
            '/User/Me/Code/app',
            ProjectRoot::forPackage('doesnt-exist')->resolve('/User/Me/Code/app/vendor/konsulting/package-root/src')
        );
    }
}
