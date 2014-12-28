<?php

class SlugifierTest extends \PHPUnit_Framework_TestCase
{
    private $slugifier;

    protected function setUp()
    {
        $this->slugifier = new Slugifier();
    }

    /**
     * @test
     * @dataProvider texts
     */
    public function shouldCreateSlug($text, $expectedSlug)
    {
        $slug = $this->slugifier->slugify($text);

        $this->assertEquals($expectedSlug, $slug);
    }

    /**
     * @test
     */
    public function shouldCreateSlugWithOtherSeparator()
    {
        $slug = $this->slugifier->slugify('Wikipedia style', '_');

        $this->assertEquals('wikipedia_style', $slug);
    }

    public function texts()
    {
        return array(
            array('Word', 'word'),
            array('An awesome slug', 'an-awesome-slug'),
            array('  should trim this text ', 'should-trim-this-text'),
            array('Práctica de acentuación', 'practica-de-acentuacion'),
            array('Cumpleaños del muerciélago', 'cumpleanos-del-muercielago')
        );
    }

    /**
     * @test
     * @dataProvider emptySlugs
     */
    public function shouldCreateEmptySlug($text)
    {
        $this->assertEmpty($this->slugifier->slugify($text));
    }

    public function emptySlugs()
    {
        return array(
            array(' ..`-. '),
            array('테스트'),
            array('اختبار'),
            array('- --'),
        );
    }
}
