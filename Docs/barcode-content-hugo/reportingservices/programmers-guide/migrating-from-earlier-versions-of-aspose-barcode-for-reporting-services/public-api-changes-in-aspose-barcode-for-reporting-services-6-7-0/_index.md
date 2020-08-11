---
title: Public API Changes in Aspose.BarCode for Reporting Services 6.7.0
type: docs
weight: 10
url: /reportingservices/public-api-changes-in-aspose-barcode-for-reporting-services-6-7-0/
---

{{% alert color="primary" %}} 

This document describes changes to the Aspose.BarCode API from version 6.2.0 to 6.7.0, that may be of interest to module/application developers. It includes not only new and updated public methods, but also a description of any changes in the behavior behind the scenes in Aspose.BarCode. 

{{% /alert %}} 
### **New DataBar Stacked Symbologies are added**
We have added support of stacked codes those are part of DataBar symbologies.

- **DataBar stacked** is a variation of the RSS-14 symbology that is stacked in two rows and is used when the normal symbol would be too wide for the application.
- **DataBar expanded stacked** barcode can grow vertically, it can encode a large amount of data in small space.
- **DataBar omnidirectional stacked** is perfectly suitable for POS (point of sale) applications.
- **Patch codes** are a set of 6 distinct barcode patterns (1, 2, 3, 4, 6 and T) that are typically used as document separators when scanning.
### **Add BarCode Component in Visual Studio 2012 or Higher**
Toolbox in Visual Studio 2012 can’t detect any report component, but we can work with a report with Barcode component in Visual Studio 2012 without problem. The main problem is, how to put Barcode component to report and there are two ways:

1. Create a report in Visual Studio 2010 and next open this report in Visual Studio 2012 and work with report.
1. Add Barcode component to report manually in code. For this need open report code (View Code) and put into <ReportItems> element: 

{{< highlight java >}}

 <CustomReportItem Name="BarCode1">

<Type>BarCode</Type>

</CustomReportItem>

{{< /highlight >}}

after this we can switch to “View Designer” and work with barcode component.
