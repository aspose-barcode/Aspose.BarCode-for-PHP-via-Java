<?php

namespace building;

require_once __DIR__ . '/../bootstrap.php';
use Aspose\Barcode\BarcodeGenerator;
use Aspose\Barcode\EncodeTypes;
use IgetBarcodeGenerator;
use assist\Assert;
use assist\FrameworkTestUtils;
use assist\TestsLauncher;
use assist\TestsAssist;
use assist\TestHelper;



class GS1CompositeBarTests
{
    private const Folder = \assist\TestsAssist::TESTDATA_ROOT . "/Generation/GS1CompositeBar/";

    function setUp(): void
    {
        \assist\TestsAssist::set_slicense();
    }

    public function test_GS1CompositeBar_ImageFromSpec1_Test()
    {
        //DataBar Limited 0113112345678906; cca 1701061510A123456
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_LIMITED, TwoDComponentType::CC_A, "(01)13112345678906|(17)010615(10)A123456", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)13112345678906|(17)010615(10)A123456", \Aspose\Barcode\DecodeType::DATABAR_LIMITED, "(01)13112345678906", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(17)010615(10)A123456");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec1.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec2_Test()
    {
        //GS1-128 0193812345678901; ccc 10ABCD1234564103898765432108
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, TwoDComponentType::CC_C, "(01)93812345678901|(10)ABCD123456(410)3898765432108", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)93812345678901|(10)ABCD123456(410)3898765432108", \Aspose\Barcode\DecodeType::GS_1_CODE_128, "(01)93812345678901", \Aspose\Barcode\DecodeType::PDF_417, "(10)ABCD123456(410)3898765432108");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec2.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec3_Test()
    {
        //UPC-E 012000001239; cca 15021231
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::UPCE, TwoDComponentType::CC_A, "01212309|(15)021231", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "01212309|(15)021231", \Aspose\Barcode\DecodeType::UPCE, "01212309", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(15)021231");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec3.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec4_Test()
    {
        //EAN-8 12345670; cca 21A12345678
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::EAN_8, TwoDComponentType::CC_A, "12345670|(21)A12345678", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "12345670|(21)A12345678", \Aspose\Barcode\DecodeType::EAN_8, "12345670", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(21)A12345678");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec4.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec5_Test()
    {
        //EAN-13 3312345678903; cca 991234-abcd
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::EAN_13, TwoDComponentType::CC_A, "3312345678903|(99)1234-abcd", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "3312345678903|(99)1234-abcd", \Aspose\Barcode\DecodeType::EAN_13, "3312345678903", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(99)1234-abcd");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec5.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec6_Test()
    {
        //DataBar Stacked 0103412345678900; cca 17010200
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_STACKED, TwoDComponentType::CC_A, "(01)03412345678900|(17)010200", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)03412345678900|(17)010200", \Aspose\Barcode\DecodeType::DATABAR_STACKED_OMNI_DIRECTIONAL, "(01)03412345678900", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(17)010200");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec6.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec7_Test()
    {
        //DataBar Limited 0103512345678907; ccb 21abcdefghijklmnopqrstuv
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_LIMITED, TwoDComponentType::CC_B, "(01)03512345678907|21abcdefghijklmnopqrstuv", false);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)03512345678907|21abcdefghijklmnopqrstuv", \Aspose\Barcode\DecodeType::DATABAR_LIMITED, "(01)03512345678907", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "21abcdefghijklmnopqrstuv");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec7.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec8_Test()
    {
        //DataBar Omnidirectional 0103612345678904; cca 11990102
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_OMNI_DIRECTIONAL, TwoDComponentType::CC_A, "(01)03612345678904|(11)990102", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)03612345678904|(11)990102", \Aspose\Barcode\DecodeType::DATABAR_OMNI_DIRECTIONAL, "(01)03612345678904", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(11)990102");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec8.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec9_Test()
    {
        //DataBar Expanded 01937123456789043103001234; cca 911A2B3C4D5E
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_EXPANDED, TwoDComponentType::CC_A, "(01)93712345678904(3103)001234|(91)1A2B3C4D5E", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)93712345678904(3103)001234|(91)1A2B3C4D5E", \Aspose\Barcode\DecodeType::DATABAR_EXPANDED, "(01)93712345678904(3103)001234", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(91)1A2B3C4D5E");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec9.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec10_Test()
    {
        //DataBar Expanded Stacked 010001234567890510ABCDEF; cca 2112345678
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_EXPANDED_STACKED, TwoDComponentType::CC_A, "(01)00012345678905(10)ABCDEF|(21)12345678", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)00012345678905(10)ABCDEF|(21)12345678", \Aspose\Barcode\DecodeType::DATABAR_EXPANDED_STACKED, "(01)00012345678905(10)ABCDEF", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(21)12345678");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec10.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec11_Test()
    {
        //GS1-128 0103212345678906; cca 21A1B2C3D4E5F6G7H8
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, TwoDComponentType::CC_A, "(01)03212345678906|(21)A1B2C3D4E5F6G7H8", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(01)03212345678906|(21)A1B2C3D4E5F6G7H8", \Aspose\Barcode\DecodeType::GS_1_CODE_128, "(01)03212345678906", \Aspose\Barcode\DecodeType::MICRO_PDF_417, "(21)A1B2C3D4E5F6G7H8");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec11.png");
    }

    public function test_GS1CompositeBar_ImageFromSpec12_Test()
    {
        //GS1-128 00030123456789012340; ccc 02130123456789093724<FNC1>101234567ABCDEFG
        $gen = new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, TwoDComponentType::CC_C, "(00)030123456789012340|(02)13012345678909(37)24(10)1234567ABCDEFG", true);
        GS1CompositeBarTests::generateAndRecognize($gen, "(00)030123456789012340|(02)13012345678909(37)24(10)1234567ABCDEFG", \Aspose\Barcode\DecodeType::GS_1_CODE_128, "(00)030123456789012340", \Aspose\Barcode\DecodeType::PDF_417, "(02)13012345678909(37)24(10)1234567ABCDEFG");
        GS1CompositeBarTests::generateAndCompare($gen, "ImageFromSpec12.png");
    }

    public function test_GS1CompositeBar_LinearComponentType_Test()
    {
        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::GS_1_COMPOSITE_BAR, "(01)03212345678906/(21)A1B2C3D4E5F6G7H8");
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setLinearComponentType(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128);
        Assert::assertEquals(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, $gen->getParameters()->getBarcode()->getGS1CompositeBar()->getLinearComponentType());
    }

    public function test_GS1CompositeBar_TwoDComponentType_Test()
    {
        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::GS_1_COMPOSITE_BAR, "(01)03212345678906/(21)A1B2C3D4E5F6G7H8");
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setTwoDComponentType(TwoDComponentType::CC_A);
        Assert::assertEquals(TwoDComponentType::CC_A, $gen->getParameters()->getBarcode()->getGS1CompositeBar()->getTwoDComponentType());
    }

    public function test_GS1CompositeBar_IsAllowOnlyGS1Encoding_Test()
    {
        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::GS_1_COMPOSITE_BAR, "(01)03212345678906/(21)A1B2C3D4E5F6G7H8");
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setAllowOnlyGS1Encoding(true);
        Assert::assertEquals(true, $gen->getParameters()->getBarcode()->getGS1CompositeBar()->isAllowOnlyGS1Encoding());
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setAllowOnlyGS1Encoding(false);
        Assert::assertEquals(false, $gen->getParameters()->getBarcode()->getGS1CompositeBar()->isAllowOnlyGS1Encoding());
    }

    public function test_GS1CompositeBar_DatabarOmniDirectional2DCompositeComponent_Test()
    {
        $gen = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_OMNI_DIRECTIONAL, TwoDComponentType::CC_A, "(01)03412345678900|(17)010200", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testDataBar2DCompositeComponent($gen, \Aspose\Barcode\DecodeType::DATABAR_OMNI_DIRECTIONAL, "(01)03412345678900");
    }

    public function test_GS1CompositeBar_DatabarStackedOmniDirectional2DCompositeComponent_Test()
    {
        $gen = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_STACKED_OMNI_DIRECTIONAL, TwoDComponentType::CC_A, "(01)03412345678900|(17)010200", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testDataBar2DCompositeComponent($gen, \Aspose\Barcode\DecodeType::DATABAR_STACKED_OMNI_DIRECTIONAL, "(01)03412345678900");
    }

    public function test_GS1CompositeBar_DATABAR_LIMITED2DCompositeComponent_Test()
    {
        $gen = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_LIMITED, TwoDComponentType::CC_A, "(01)13112345678906|(17)010615", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testDataBar2DCompositeComponent($gen, \Aspose\Barcode\DecodeType::DATABAR_LIMITED, "(01)13112345678906");
    }

    public function test_GS1CompositeBar_DATABAR_EXPANDED2DCompositeComponent_Test()
    {
        $gen = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_EXPANDED, TwoDComponentType::CC_A, "(01)93712345678904(3103)001234|(91)1A2B3C4D5E", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testDataBar2DCompositeComponent($gen, \Aspose\Barcode\DecodeType::DATABAR_EXPANDED, "(01)93712345678904(3103)001234");
    }

    public function test_GS1CompositeBar_DATABAR_EXPANDED_STACKED2DCompositeComponent_Test()
    {
        $gen = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::DATABAR_EXPANDED_STACKED, TwoDComponentType::CC_A, "(01)93712345678904(3103)001234|(91)1A2B3C4D5E", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testDataBar2DCompositeComponent($gen, \Aspose\Barcode\DecodeType::DATABAR_EXPANDED_STACKED, "(01)93712345678904(3103)001234");
    }

    public function test_GS1CompositeBar_GS_1_CODE_128Composite2D_CC_A_CodeSetA_Test()
    {
        $generator = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, TwoDComponentType::CC_A, "(10)12345678|(10)ABCD123456", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testGS_1_CODE_128LastLinkageFlag($generator, "(10)12345678", Code128SubType::CODE_SET_A);
    }

    public function test_GS1CompositeBar_GS_1_CODE_128Composite2D_CC_A_CodeSetC_Test()
    {
        $generator = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, TwoDComponentType::CC_A, "(10)ABCD|(10)ABCD123456", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testGS_1_CODE_128LastLinkageFlag($generator, "(10)ABCD", Code128SubType::CODE_SET_C);
    }

    public function test_GS1CompositeBar_GS_1_CODE_128Composite2D_CC_C_CodeSetB_Test()
    {
        $generator = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, TwoDComponentType::CC_C, "(10)12345678|(10)ABCD123456", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testGS_1_CODE_128LastLinkageFlag($generator, "(10)12345678", Code128SubType::CODE_SET_B);
    }

    public function test_GS1CompositeBar_GS_1_CODE_128Composite2D_CC_C_CodeSetA_Test()
    {
        $generator = (new GS1CompositeBarGenerator(\Aspose\Barcode\EncodeTypes::GS_1_CODE_128, TwoDComponentType::CC_C, "(10)ABCD|(10)ABCD123456", true))->getBarcodeGenerator();
        GS1CompositeBarTests::testGS_1_CODE_128LastLinkageFlag($generator, "(10)ABCD", Code128SubType::CODE_SET_A);
    }

    private static function testGS_1_CODE_128LastLinkageFlag($generator, $codeText, $code128SubType)
    {
        $reader = new \Aspose\Barcode\BarCodeReader($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, \Aspose\Barcode\DecodeType::GS_1_CODE_128);
        {
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals(\Aspose\Barcode\DecodeType::GS_1_CODE_128, $reader->getFoundBarCodes()[0]->getCodeType());
            Assert::assertEquals($codeText, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            $lastPortion = $reader->getFoundBarCodes()[0]->getExtended()->getCode128()->getCode128DataPortions()[sizeof($reader->getFoundBarCodes()[0]->getExtended()->getCode128()->getCode128DataPortions()) - 1];
            Assert::assertEquals($code128SubType, $lastPortion->getCode128SubType());
            Assert::assertEquals("", $lastPortion->getData());
        }
    }

    private static function testDataBar2DCompositeComponent($generator, $decodeType, $codeText)
    {
        $reader = new \Aspose\Barcode\BarCodeReader($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, $decodeType);
        {
            Assert::assertEquals(1, sizeof($reader->readBarCodes()));
            Assert::assertEquals($decodeType, $reader->getFoundBarCodes()[0]->getCodeType());
            Assert::assertEquals($codeText, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
            Assert::assertEquals(true, $reader->getFoundBarCodes()[0]->getExtended()->getDataBar()->is2DCompositeComponent());
        }
    }

    public static function generateAndSave(IGetBarcodeGenerator $gen, string $filename)
    {
        FrameworkTestUtils::generateAndSave($gen, GS1CompositeBarTests::Folder, $filename);
    }

    public static function generateAndCompare(IGetBarcodeGenerator $gen, string $filename)
    {
        GS1CompositeBarTests::generateAndCompareBarcodeGenerator($gen->getBarcodeGenerator(), $filename);
    }

    public static function generateAndCompareBarcodeGenerator($gen, string $filename)
    {
        FrameworkTestUtils::generateAndCompareBarcodeGenerator($gen, GS1CompositeBarTests::Folder, $filename);
    }

    public static function generateAndRecognize(IGetBarcodeGenerator $gen, string $mainCodeText, $oneDType, string $oneDCodeText, $twoDType, string $twoDCodeText)
    {
        $generator = $gen->getBarcodeGenerator();
        GS1CompositeBarTests::generateAndRecognizeBarcodeGenerator($generator, $mainCodeText, $oneDType, $oneDCodeText, $twoDType, $twoDCodeText);
    }

    public static function generateAndRecognizeBarcodeGenerator($generator, string $mainCodeText, $oneDType, string $oneDCodeText, $twoDType, string $twoDCodeText)
    {
        $reader = new \Aspose\Barcode\BarCodeReader($generator->generateBarCodeImage(\Aspose\Barcode\BarCodeImageFormat::PNG), null, \Aspose\Barcode\DecodeType::GS_1_COMPOSITE_BAR);
        GS1CompositeBarTests::recognize($reader, $mainCodeText, $oneDType, $oneDCodeText, $twoDType, $twoDCodeText);
    }

    private static function recognize($reader, $mainCodeText, $oneDType, $oneDCodeText, $twoDType, $twoDCodeText)
    {
        Assert::assertEquals(1, sizeof($reader->readBarCodes()));
        Assert::assertEquals(\Aspose\Barcode\DecodeType::GS_1_COMPOSITE_BAR, $reader->getFoundBarCodes()[0]->getCodeType());
        Assert::assertEquals($mainCodeText, $reader->getFoundBarCodes()[0]->getCodeText("UTF-8"));
        Assert::assertEquals($oneDType, $reader->getFoundBarCodes()[0]->getExtended()->getGS1CompositeBar()->getOneDType());
        Assert::assertEquals($oneDCodeText, $reader->getFoundBarCodes()[0]->getExtended()->getGS1CompositeBar()->getOneDCodeText());
        Assert::assertEquals($twoDType, $reader->getFoundBarCodes()[0]->getExtended()->getGS1CompositeBar()->getTwoDType());
        Assert::assertEquals($twoDCodeText, $reader->getFoundBarCodes()[0]->getExtended()->getGS1CompositeBar()->getTwoDCodeText());
    }
}

class GS1CompositeBarGenerator extends IgetBarcodeGenerator
{
    private $_oneDType;
    private $_twoDType;
    private $_codetext;
    private $_isAllowOnlyGS1Encoding;

    function __construct($oneDType, $twoDType, $codetext, $isAllowOnlyGS1Encoding)
    {
        $this->_oneDType = $oneDType;
        $this->_twoDType = $twoDType;
        $this->_codetext = $codetext;
        $this->_isAllowOnlyGS1Encoding = $isAllowOnlyGS1Encoding;
    }

    function getBarcodeGenerator()
    {
        $gen = new \Aspose\Barcode\BarcodeGenerator(\Aspose\Barcode\EncodeTypes::GS_1_COMPOSITE_BAR, $this->_codetext);
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setLinearComponentType($this->_oneDType);
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setTwoDComponentType($this->_twoDType);
        $gen->getParameters()->getBarcode()->getGS1CompositeBar()->setAllowOnlyGS1Encoding($this->_isAllowOnlyGS1Encoding);

        $this->setBarcodeGeneratorParameters($gen);
        return $gen;
    }

    function setBarcodeGeneratorParameters($generator)
    {
    }
}

TestsLauncher::launch('\building\GS1CompositeBarTests', "");