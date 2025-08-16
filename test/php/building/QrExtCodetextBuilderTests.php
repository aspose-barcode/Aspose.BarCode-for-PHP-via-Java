<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';

use Aspose\Barcode\QrExtCodetextBuilder;
use assist\Assert;
use assist\TestsLauncher;
use assist\TestsAssist as ta;

class QrExtCodetextBuilderTests
{
     function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    function test1()
    {
        $lTextBuilder = new QrExtCodetextBuilder();
        $lTextBuilder->addFNC1FirstPosition();
        $lTextBuilder->addPlainCodetext("000%89%%0");
        $lTextBuilder->addFNC1GroupSeparator();
        $lTextBuilder->addPlainCodetext("12345&lt;FNC1&gt;");
        //generate codetext
        $lCodetext = $lTextBuilder->getExtendedCodetext();
        ta::prt($lCodetext);
        Assert::assertEquals($lCodetext, "<FNC1>000%89%%012345&lt;FNC1&gt;");
    }

    function test2()
    {
        //create codetext
        $lTextBuilder = new QrExtCodetextBuilder();
        $lTextBuilder->addFNC1SecondPosition("12");
        $lTextBuilder->addPlainCodetext("TRUE3456");
        //generate codetext
        $lCodetext = $lTextBuilder->getExtendedCodetext();
        ta::prt($lCodetext);
        Assert::assertEquals($lCodetext, "<FNC1>(12)TRUE3456");
    }

    function test3()
    {
        //create codetext
        $lTextBuilder = new QrExtCodetextBuilder();
        $lTextBuilder->addECICodetext(\Aspose\Barcode\ECIEncodings::Win1251, "Will");
        $lTextBuilder->addECICodetext(\Aspose\Barcode\ECIEncodings::UTF8, "Right");
        $lTextBuilder->addECICodetext(\Aspose\Barcode\ECIEncodings::UTF16BE, "Power");
        $lTextBuilder->addPlainCodetext("t\\e\\st");
        //generate codetext
        $lCodetext = $lTextBuilder->getExtendedCodetext();
        ta::prt($lCodetext);
//        Assert::assertEquals($lCodetext, "\\000022Will\\000026Right\\000025Power/000000t\\e\\st");
        //TODO expected \000022Will\000026Right\000025Power\000000t\st and actual \000022Will\000026Right\000025Power\000000t\\e\\st values are not equal
//        Assert::assertEquals( "\\000022Will\\000026Right\\000025Power\\000000t\e\st",$lCodetext);
    }

}

TestsLauncher::launch('\building\QrExtCodetextBuilderTests', null);
