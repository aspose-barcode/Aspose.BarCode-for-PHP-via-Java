---
title: Aspose.BarCode for Reporting Services 18.9 Release Notes
type: docs
weight: 30
url: /reportingservices/aspose-barcode-for-reporting-services-18-9-release-notes/
---

{{% alert color="primary" %}} 

This page contains release notes information for Aspose.Barcode for Reporting Services 18.9.

{{% /alert %}} 
## **New Features**
- Implement UpcaGs1Code128Coupon with AutoSizeMode Interpolation for new BarCode Generation API. 
- Deprecate BarCodeBuilder.
## **All Changes**

|**Key**|**Summary**|**Category**|
| :- | :- | :- |
|BARCODENET-36940|Implement UpcaGs1Code128Coupon with AutoSizeMode Interpolation for new BarCode Generation API.|New Feature|
|BARCODENET-37013|Deprecate BarCodeBuilder|New Feature|
|BARCODENET-36795|DPI settings work incorrectly with rotation.|Bug|
|BARCODENET-36956|Incorrect Databars are generated from GS1 string.|Bug|
|BARCODENET-37008|ITF14 barcode fails GS1 Verification Process.|Bug|
|BARCODENET-36957|The text part isn't correct in ENA13 when the resolution is changed.|Bug|
## **Public API and Backward Incompatible Changes**
Class BarCodeBuilder has been deprecated. Please use BarCodeGenerator instead.
