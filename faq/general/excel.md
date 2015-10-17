---
title: "How to create, edit, import to database and work with Excel in PHP?"
read_time: "1 min"
updated: "october 3, 2015"
group: "general"
permalink: "/faq/excel-and-php/"
---

[PHPExcel] can be used to read, create and write spreadsheet.

[PHPExcel] can be installed via composer. Use the below provided composer instruction

```bash
composer require phpoffice/phpexcel
```
OR
directly put the below code in composer.json file

```json
"require": {
      ...
      "phpoffice/phpexcel":"1.8.1"
      ...
    }
```
After adding above line update the composer.

```bash
composer update
```
Once composer is installed we can start working with PHPExcel.

# Example

After `composer update` is complete. Create a new file named "create_excel.php" at the project root. `composer.json` and newly created folder should be in the same level in the project_root. In "create_excel.php" file paste the below sample code snippet. After that browse the php page in the browser. This will create a new excel sheet "create_excel.xlsx" in the same folder where "create_excel.php"  is.

```php
<?php
/**
* Always refer to the package documentation for the latest example
* @see http://phpexcel.codeplex.com/wikipage?title=Examples
*/
require __DIR__.'/vendor/autoload.php';

echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");

// Add some data
echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');

// Rename sheet
echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Save Excel 2007 file
echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

// Echo done
echo date('H:i:s') . " Done writing file.\r\n";
```
Refer to [PHPExcel Github] to follow more on [PHPExcel].

[PHPExcel]:http://phpexcel.codeplex.com/
[Homepage]:http://phpexcel.codeplex.com/
[PHPExcel Github]:https://github.com/PHPOffice/PHPExcel