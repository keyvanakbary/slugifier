<?php

class SlugifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider supportedStrings
     */
    public function shouldCreateSlug($text, $expectedSlug)
    {
        $slug = Slugifier::slugify($text);

        $this->assertEquals($expectedSlug, $slug);
    }

    public function supportedStrings()
    {
        return array(
            array('Word', 'word'),
            array('JúST å fëw wørds', 'just-a-few-words'),
            array('J\'étudie le français', 'j-etudie-le-francais'),
            array('An awesome slug', 'an-awesome-slug'),
            array('  should trim  this   text ', 'should-trim-this-text'),
            array('Práctica de acentuación', 'practica-de-acentuacion'),
            array('Cumpleaños del muerciélago', 'cumpleanos-del-muercielago'),
            array('هذا هو الاختبار', 'hth-ho-l-khtb-r'),
            array('Блоґ їжачка', 'blog-jizhachka'),
            array('Это тест', 'eto-test'),
            array('Це тест', 'ce-test'),
            array('Đây là một thử nghiệm', 'day-la-mot-thu-nghiem'),
            array('Αυτή είναι μια δοκιμή', 'ayte-einai-mia-dokime'),
            array('°¹²³@¶', '0123atp'),
        );
    }

    /**
     * @test
     * @dataProvider notSupportedStrings
     */
    public function shouldCreateEmptySlug($text)
    {
        $this->assertEmpty(Slugifier::slugify($text));
    }

    public function notSupportedStrings()
    {
        return array(
            array(' ..`-. '),
            array('테스트'),
            array('- --'),
            array('這是一個測試')
        );
    }

    /**
     * @test
     */
    public function shouldCreateSlugWithCustomSeparator()
    {
        $slug = Slugifier::slugify('Wikipedia style', '_');

        $this->assertEquals('wikipedia_style', $slug);
    }
}
