---
title: Aspose.BarCode for Reporting Services 7.7.0 Release Notes
type: docs
weight: 80
url: /reportingservices/aspose-barcode-for-reporting-services-7-7-0-release-notes/
---

The list of improvements and changes that are released in Aspose.BarCode for Reporting Services as follows:
## **New Features**
BARCODENET-3426 Add MaxiCode implementation

BARCODENET-3426 Add MaxiCode implementation
## **New propert**
{{< highlight java >}}

 y MaxiCodeEncodeMode

has been added to the class


BarCodeBuilder.

It sets or gets the value indicating the encoding mode for the MaxiCode.


New method

IsOverridedDimensionX () has been added to the class

BarCodeBuilder.


It checks whether X-dimension has been specified by the user.

New

Symbology.MaxiCode and BarCodeReadType.MaxiCode have been added;

Code sample




Dim builder as New BarCodeBuilder(

"MaxiCode (19 chars)"

, Symbology.MaxiCode);

builder.Save(

"MaxiCode.png"

, BarCodeImageFormat.Png);

{{< /highlight >}}
