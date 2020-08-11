---
title: Install Manually
type: docs
weight: 20
url: /reportingservices/install-manually/
---

{{% alert color="primary" %}} 

There are two ways to install Aspose.BarCode for Reporting Services:

- [Using the MSI installer](/barcode/reportingservices/install-with-msi-installer-html/). This is the recommended installation method.
- Installing manually. This process is described below.

{{% /alert %}} 

If you install Aspose.BarCode manually instead of using the [MSI installer](/barcode/reportingservices/install-with-msi-installer-html/) some files may not be upgraded, for example the offline documentation.
### **Manual Installation**
You may need to install Aspose.BarCode for Reporting Services manually under the following conditions:

- Automatic installation fails for some reason, such as I/O security issues.
- You need to install the product on a named (not default) instance of Reporting Services or on multiple instances.
- You want to upgrade to the latest version by simply replacing the assembly instead of uninstalling the old version and then installing the new one using the MSI installer.

{{% alert color="primary" %}} 

To install Aspose.BarCode for Reporting Services manually, some registration and installation steps have to be performed manually. For manual installation, developers need to copy and modify files in the installation directory of Microsoft SQL Server Reporting Services.

- The SSRS 2000 assembly is located in the Bin\SSRS2000 directory of the ZIP archive,
- The SSRS 2005 assembly is located in the Bin\SSRS2005 directory, and
- The SSRS 2008 assembly is located in the Bin\SSRS2008 directory.
- The SSRS 2008 R2 assembly is located in the Bin\SSRS2008R2 directory.
- The SSRS 2012 assembly is located in the Bin\SSRS2012 directory.
- The SSRS 2014 assembly is located in the Bin\SSRS2014 directory.
- The SSRS 2016 assembly is located in the Bin\SSRS2016 directory. 
- The SSRS 2017 assembly is located in the Bin\SSRS2017 directory.
- The SSRS 2019 assembly is located in the Bin\SSRS2019 directory.

{{% /alert %}} 
#### **Step 1: Locate the Report Server installation directory**
The root directory for Microsoft SQL Server is usually C:\Program Files\Microsoft SQL Server.
Further process is slightly different for Reporting Services 2000 and 2005/2008:

- SQL Report Server 2000 is installed in the C:\Program Files\Microsoft SQL Server\MSSQL\Reporting Services\ReportServer directory.
- There could be several instances of Microsoft SQL Server 2005/2008 configured on the machine and they will occupy several MSSQL.x subdirectories such as MSSQL.1, MSSQL.2 and so on. Find the correct directory, that is C:\Program Files\Microsoft SQL Server\MSSQL.x\Reporting Services\ReportServer, before proceeding with the following steps.
- SQL Report Server 2012 is installed in the C:\Program Files\Microsoft SQL Server\MSRS11.MSSQLSERVER\Reporting Services\ReportServer directory.

As you can see, the only difference between the Reporting Services 2000 and 2005/2008 installation directories is that the path includes “MSSQL” for the 2000 version and “MSSQL.x” for the 2005/2008 version. All paths used below refer to this directory as <Instance>.
#### **Step 2: Copy the DLLs to the installation directory**
Copy **Aspose.BarCode.ReportingServices.dll** to the C:\Program Files\Microsoft SQL Server\<Instance>\Reporting Services\ReportServer\bin folder.

For Microsoft SQL Server 2012, copy Bin\SSRS2012\RunTimeVersion\ **Aspose.BarCode.ReportingServices.dll** to the C:\Program Files\Microsoft SQL Server\<Instance>\Reporting Services\ReportServer\bin folder.

For Microsoft SQL Server 2019, copy **Aspose.BarCode.ReportingServices.dll** from SSRS2019 to the C:\Program Files\Microsoft SQL Server Reporting Services\SSRS\ReportServer\bin\ folder.
#### **Step 3: Register Aspose.BarCodes**
Register this product as render item in the **rsreportserver.config** file.To do this:

1. Open C:\Program Files\Microsoft SQL Server\MSSQL.x\Reporting Services\ReportServer\rsreportserver.config
1. Add the following lines into the <ReportItems> element:

**[XML]**

{{< highlight csharp >}}

 <Configuration>

...

   <Extensions>

 ...

    <!-- Start config of Aspose.BarCode for Reporting Services-->

    <ReportItems>

      <ReportItem Name="BarCode" Type="Aspose.BarCode.ReportingServices.BarCodeReportItem, Aspose.BarCode.ReportingServices"/>

      </ReportItems>

    <!-- End of config -->

   </Extensions>

 </Configuration>



{{< /highlight >}}
#### **Step 4: GivE Aspose.BarCode Permission to Execute**
1. Open C:\Program Files\Microsoft SQLServer\MSSQL.x\Reporting Services\ReportServer\rssrvpolicy.config
1. Add the following text as the last item in the second to outer <CodeGroup> element (which should be <CodeGroup class="FirstMatchCodeGroup" version="1" PermissionSetName="Execution" Description="This code group grants MyComputer code Execution permission.">):

**\XML**

{{< highlight csharp >}}

 <CodeGroup>

...

  <CodeGroup>

 ...

    <!-- Start config of Aspose.BarCode for Reporting Services-->

    <CodeGroup class="UnionCodeGroup" version="1" PermissionSetName="FullTrust" Name="BarCode" Description="Aspose.BarCode for Reporting Services ">

                <IMembershipCondition class="StrongNameMembershipCondition" version="1" PublicKeyBlob="00240000048000009400000006020000002400005253413100040000010001005542E99CECD28842DAD186257B2C7B6AE9B5947E51E0B17B4AC6D8CECD3E01C4D20658C5E4EA1B9A6C8F854B2D796C4FDE740DAC65E834167758CFF283EED1BE5C9A812022B015A902E0B97D4E95569EB8C0971834744E633D9CB4C4A6D8EDA03C12F486E13A1A0CB1AA101AD94943236384CBBF5C679944B994DE9546E493BF" />

    </CodeGroup>

   <!-- End of config-->

  </CodeGroup>

 </CodeGroup>



{{< /highlight >}}

While installing Aspose.BarCode for Reporting Services on MS SQL Server 2012 environment, you need additionally set FullTrust instead of Execution for Report_Expressions_Default_Permissions and ZoneMembershipCondition(optional) in the file rssrvpolicy.config
