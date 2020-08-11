---
title: Select an ECC Level to Encode a Barcode
type: docs
weight: 80
url: /reportingservices/select-an-ecc-level-to-encode-a-barcode/
---

{{% alert color="primary" %}} 

This help topic briefs the way to set ECC level to encode DataMatrix barcode.

{{% /alert %}} 
### **Set ECC Level**
The new DatamatrixECC property is added to the BarCodeBuilder class in order to select an appropriate ECC level while encoding DataMatrix barcode. DataMatrix symbology adopts two types of error correction algorithm, depending on the ECC level employed. The ECC levels 000 to 140, which offer five different error correction levels. However, the commonly used ECC 200 level uses Reed-Solomon error correction.

The new DataMatrixEccType Enum has been added to specify the type of the ECC to encode.

- EccAuto - Specifies that encoded Ecc type is defined by default Reed-Solomon error correction or ECC 200.
- Ecc000 - Specifies that encoded Ecc type is defined ECC 000.
- Ecc050 - Specifies that encoded Ecc type is defined ECC 050.
- Ecc080 - Specifies that encoded Ecc type is defined ECC 080.
- Ecc100 - Specifies that encoded Ecc type is defined ECC 100.
- Ecc140 - Specifies that encoded Ecc type is defined ECC 140.
- Ecc200 - Specifies that encoded Ecc type is defined ECC 200.
  (This is recommended to use)
#### **Add a reference of the Aspose.BarCode.ReportingServices.dll**
1. Select report in solution explorer.
1. In Visual Studio main menu, Select **Report** and then **Report Properties**.
1. Click the **References** tab.
1. Browse to the Aspose.BarCode.ReportingServices.dll and add it to the references.
1. A reference to System.Drawing dll is also required, which can be found in the .NET tab.
1. In **Add or remove classes** part, add the description for the class as follows:
   Class Name:Aspose.BarCode.ReportingServices.BarCodeBuilder Instance Name: objBarCode
1. Click on the **OK** button.
#### **Add the source code**
1. Select report in solution explorer.
1. In Visual Studio main menu, Select **Report** and then **Report Properties**.
1. Click the **Code** tab.
1. Add the following source code
   The property DatamatrixEcc in BarCodeBuilder class allows to select ECC level. This property works only with DataMatrix symbology. 

Error rendering macro 'code' : Invalid value specified for parameter lang

1. Click on the **OK** button.
   So far, we have added the code and Aspose library reference to generate the barcode.
#### **Drag an image control on the report:**
1. Select **Database** as the **Image Source**.
1. In **MIME type**, select an appropriate format.
1. Select **Size** tab.
1. Change the display size to "Original Size*.
1. Click on the **OK** button.
#### **Setting the image control value**
1. Right-click the image control and select **Properties**.
1. Set the **Value** property to =Code.GetBarCodeImageDataMatrixECC()
   Save all the files.
