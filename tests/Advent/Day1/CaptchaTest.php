<?php
namespace Advent\Day1;

use PHPUnit\Framework\TestCase;

class CaptchaTest extends TestCase
{
    public function testItReturnsSumOfAllDigitsMatchingItsFollowingDigit()
    {
        $this->assertEquals(0, (new Captcha([1, 2, 3, 4]))->getSum());
        $this->assertEquals(3, (new Captcha([1, 1, 2, 2]))->getSum());
        $this->assertEquals(4, (new Captcha([1, 1, 1, 1]))->getSum());
        $this->assertEquals(9, (new Captcha([9, 1, 2, 1, 2, 9]))->getSum());
    }

    public function testItReturnsSumOfAllDigitsMatchingHalfwayRoundStepsForwardDigit()
    {
        $this->assertEquals(6, (new Captcha([1, 2, 1, 2]))->getSumHalfwayAround());
        $this->assertEquals(0, (new Captcha([1, 2, 2, 1]))->getSumHalfwayAround());
        $this->assertEquals(4, (new Captcha([1, 2, 3, 4, 2, 5]))->getSumHalfwayAround());
        $this->assertEquals(12, (new Captcha([1, 2, 3, 1, 2, 3]))->getSumHalfwayAround());
        $this->assertEquals(4, (new Captcha([1, 2, 1, 3, 1, 4, 1, 5]))->getSumHalfwayAround());
    }
}
