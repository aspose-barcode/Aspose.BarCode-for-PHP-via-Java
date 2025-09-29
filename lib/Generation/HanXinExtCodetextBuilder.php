<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\ExtCodeItemDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * <p>Extended codetext generator for Han Xin Code for Extended Mode of HanXinEncodeMode</p>
 * </p><p><hr><blockquote><pre>
 * <pre>
 *
 * //Extended codetext mode
 * //create codetext
 * $codeTextBuilder = new HanXinExtCodetextBuilder();
 * $codeTextBuilder->addGB18030TwoByte("漄");
 * $codeTextBuilder->addGB18030FourByte("㐁");
 * $codeTextBuilder->addCommonChineseRegionOne("全");
 * $codeTextBuilder->addCommonChineseRegionTwo("螅");
 * $codeTextBuilder->addNumeric("123");
 * $codeTextBuilder->addText("qwe");
 * $codeTextBuilder->addUnicode("ıntəˈnæʃənəl");
 * $codeTextBuilder->addECI("ΑΒΓΔΕ", 9);
 * $codeTextBuilder->addAuto("abc");
 * $codeTextBuilder->addBinary("abc");
 * $codeTextBuilder->addURI("backslashes_should_be_doubled\000555:test");
 * $codeTextBuilder->addGS1("(01)03453120000011(17)191125(10)ABCD1234(21)10");
 * $expectedStr = "漄㐁全螅123qweıntəˈnæʃənəlΑΒΓΔΕabcabcbackslashes_should_be_doubled\000555:test(01)03453120000011(17)191125(10)ABCD1234(21)10";
 * //generate codetext
 * $str = $codeTextBuilder->getExtendedCodetext();
 * //generate
 * $bg = new BarcodeGenerator(EncodeTypes::HAN_XIN, $str);
 * $bg->getParameters()->getBarcode()->getHanXin()->setHanXinEncodeMode(HanXinEncodeMode::EXTENDED);
 * $img = $bg->generateBarCodeImage(BarcodeImageFormat::PNG);
 * $r = new BarCodeReader($img, null, DecodeType::HAN_XIN))
 * $found = $r->readBarCodes();
 * Assert::assertEquals(1, sizeof(found));
 * Assert::assertEquals($expectedStr, $found[0]->getCodeText());
 * </pre>
 * </pre></blockquote></hr></p>
 */
class HanXinExtCodetextBuilder
{

    protected $_list;

    function __construct()
    {
        $this->_list = array();
    }

    function init(): void
    {
    }

    /**
     * <p>
     * Adds codetext fragment in ECI mode
     * </p>
     * @param string text Codetext string
     * @param int encoding ECI encoding in integer format
     */
    public function addECI(string $text, int $encoding): void
    {
        $extCodeItemDTO = new ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::ECI;
        $extCodeItemDTO->arguments = array($text, $encoding);
        $this->_list[] = $extCodeItemDTO;
    }

    /**
     * <p>
     * Adds codetext fragment in Auto mode
     * </p>
     * @param string text Codetext string
     */
    public function addAuto(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::Auto;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in Binary mode
     * </p>
     * @param text Codetext string
     */
    public function addBinary(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::Binary;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in URI mode
     * </p>
     * @param text Codetext string
     */
    public function addURI(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::URI;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in Text mode
     * </p>
     * @param text Codetext string
     */
    public function addText(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::Text;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in Numeric mode
     * </p>
     * @param text Codetext string
     */
    public function addNumeric(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::Numeric;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in Unicode mode
     * </p>
     * @param text Codetext string
     */
    public function addUnicode(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::Unicode;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in Common Chinese Region One mode
     * </p>
     * @param text Codetext string
     */
    public function addCommonChineseRegionOne(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::CommonChineseRegionOne;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in Common Chinese Region Two mode
     * </p>
     * @param text Codetext string
     */
    public function addCommonChineseRegionTwo(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::CommonChineseRegionTwo;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in GB18030 Two Byte mode
     * </p>
     * @param text Codetext string
     */
    public function addGB18030TwoByte(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::GB18030TwoByte;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in GB18030 Four Byte mode
     * </p>
     * @param text Codetext string
     */
    public function addGB18030FourByte(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::GB18030FourByte;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Adds codetext fragment in GS1 mode
     * </p>
     * @param text Codetext string
     */
    public function addGS1(string $text): void
    {
        $extCodeItemDTO = new \Aspose\Barcode\Bridge\ExtCodeItemDTO();
        $extCodeItemDTO->extCodeItemType = HanXinExtCodetextBuilderType::GS1;
        $extCodeItemDTO->arguments = array($text);
        array_push($this->_list, $extCodeItemDTO);
    }

    /**
     * <p>
     * Returns codetext from Extended mode codetext builder
     * </p>
     * @return string Codetext in Extended mode
     */
    public function getExtendedCodetext(): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $extendedCodetext = $client->HanXinExtCodetextBuilder_getExtendedCodetext($this->_list);
            $thriftConnection->closeConnection();
            return $extendedCodetext;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}