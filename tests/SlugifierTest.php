<?php

namespace slugifier;

class SlugifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider supportedStrings
     */
    public function shouldCreateSlug($text, $expectedSlug)
    {
        $slug = slugify($text);

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
            array('Αυτή είναι μια δοκιμή', 'ayti-einai-mia-dokimi'),
            array('°¹²³@¶', '0123atp'),
        );
    }

    /**
     * @test
     * @dataProvider notSupportedStrings
     */
    public function shouldCreateEmptySlug($text)
    {
        $this->assertEmpty(slugify($text));
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
        $slug = slugify('Wikipedia style', '_');

        $this->assertEquals('wikipedia_style', $slug);
    }

    /**
     * @test
     * @dataProvider slugModifiers
     */
    public function shouldCreateSlugsWithModifiers($text, $modifier, $expectedSlug)
    {
        $slug = slugify($text, '-', $modifier);

        $this->assertEquals($expectedSlug, $slug);
    }

    public function slugModifiers()
    {
        return array(
            array('Bu bir örnektir', mod('tr'), 'bu-bir-ornektir'),
            array('Supernatura estaĵo', mod('eo'), 'supernatura-estajxo'),
            array('Interesting flavors', array('o' => 'ou'), 'interesting-flavours')
        );
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function invalidModifierIsoShouldThrowException()
    {
        mod('invalid');
    }

    /**
     * @test
     * @dataProvider supportedIsoModifiers
     */
    public function shouldSupportIsoModifiers($iso)
    {
        $this->assertNotNull(mod($iso));
    }

    public function supportedIsoModifiers()
    {
        return array(
            array('eo'),
            array('tr')
        );
    }
}
