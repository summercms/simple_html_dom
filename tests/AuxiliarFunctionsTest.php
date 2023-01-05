<?php


use PHPUnit\Framework\TestCase;
use Voku\Helper\HtmlDomParser;

final class AuxiliarFunctionsTest extends TestCase
{
    public function testGetTag()
    {
        $parser= HtmlDomParser::str_get_html('<body><span>Hello</span></body>');
        static::assertSame('span', $parser->findOne('span')->getTag());
    }

    public function testRemoveAttributes()
    {
        $parser= HtmlDomParser::str_get_html('<body><span id=\'hello\' class=\'hello\'>Hello</span></body>');
        static::assertSame('<span>Hello</span>', $parser->findOne('span')->removeAttributes()->outerHtml());
    }

    public function testRemoveUsingDelete()
    {
        $parser= HtmlDomParser::str_get_html("<body><span id='hello' class='hello'>Hello</span></body>");
        $parser->findOne('span')->delete();
        static::assertSame('<body></body>', $parser->outerHtml());
    }
}
