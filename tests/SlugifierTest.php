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
        return [
            ['Word', 'word'],
            ['JúST å fëw wørds', 'just-a-few-words'],
            ['J\'étudie le français', 'j-etudie-le-francais'],
            ['An awesome slug', 'an-awesome-slug'],
            ['  should trim  this   text ', 'should-trim-this-text'],
            ['Práctica de acentuación', 'practica-de-acentuacion'],
            ['Cumpleaños del muerciélago', 'cumpleanos-del-muercielago'],
            ['هذا هو الاختبار', 'hth-ho-l-khtb-r'],
            ['Блоґ їжачка', 'blog-jizhachka'],
            ['Это тест', 'eto-test'],
            ['Це тест', 'ce-test'],
            ['Đây là một thử nghiệm', 'day-la-mot-thu-nghiem'],
            ['Αυτή είναι μια δοκιμή', 'ayti-einai-mia-dokimi'],
            ['°¹²³@¶', '0123atp']
        ];
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
        return [
            [' ..`-. '],
            ['테스트'],
            ['- --'],
            ['這是一個測試']
        ];
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
        return [
            ['Bu bir örnektir', MOD['tr'], 'bu-bir-ornektir'],
            ['Supernatura estaĵo', MOD['eo'], 'supernatura-estajxo'],
            ['Interesting flavors', ['o' => 'ou'], 'interesting-flavours']
        ];
    }

    /**
     * @test
     * @dataProvider supportedIsoModifiers
     */
    public function shouldSupportIsoModifiers($iso)
    {
        $this->assertNotNull(MOD[$iso]);
    }

    public function supportedIsoModifiers()
    {
        return [
            ['eo'],
            ['tr']
        ];
    }
}
