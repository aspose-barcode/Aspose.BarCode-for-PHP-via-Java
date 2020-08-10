---
title: Set Service Markers for Barcode Value Field
type: docs
weight: 10
url: /sharepoint/set-service-markers-for-barcode-value-field/
---

With Aspose.BarCode for SharePoint, we can inject service markers as the barcode value field. This allows the barcode field to automatically pick the value depending on the service marker. Also, this approach allows you to concatenate two or more values to generate a single label.

A few of such markers are listed below for illustration,

- [SPList:Title] – List title
- [SPList:ItemsCount] – Total number of items
- [SPFieldValue:<Field Display Name>] – Item field Value (that is [SPFieldValue:Priority])

Please check [Add Barcode Column to SharePoint lists](/barcode/sharepoint/add-barcode-column-to-sharepoint-lists-html/) for information on how to add a barcode field to a SharePoint custom list.

Assuming that the list already has a barcode column, we move forward to set the barcode’s code text using the service markers. Below is an example of a payroll list.

**Adding a new payroll item** 

![todo:image_alt_text](set-service-markers-for-barcode-value-field_1.png)

You may need to generate the barcode depending upon an employee’s department. For that you can use the [SPFieldValue:Department] marker.

The output is shown below.

**The barcode in the custom list.** 

![todo:image_alt_text](set-service-markers-for-barcode-value-field_2.png)
