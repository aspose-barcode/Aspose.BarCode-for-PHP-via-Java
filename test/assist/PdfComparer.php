<?php

namespace assist;
use Aspose\Barcode\BarCodeImageFormat;



class PdfComparer
{

    public static function comparePdfHelper($gen, $folder, $fileName)
    {
        $compared = $gen->generateBarCodeImage(BarCodeImageFormat::PDF);

        $path = FrameworkTestUtils::addFrameworkPostFixToFileName(($folder . "/" . $fileName));
        //string path = Global.PathCombine(folder, fileName);

        $expected = base64_encode(file_get_contents($path));
        Assert::assertEquals($compared, $expected);

        //compare
    }
}