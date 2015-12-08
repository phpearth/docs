---
title: "How to work with Excel in PHP?"
read_time: "1 min"
updated: "october 26, 2015"
group: "general"
permalink: "/faq/excel-and-php/"

compass:
  prev: "/faq/how-to-show-errors/"
  next: "/faq/face-detection/"
---

[PHPExcel] library can be used to read, create and write spreadsheets. It can be installed via Composer. Use the provided Composer instructions below.

Simple and recommended way to install PHP library using Composer is with `composer require` command.

```bash
$ composer require phpoffice/phpexcel
```

The alternative way is to manually add the code below in `composer.json` file:

```javascript
"require": {
    ...
    "phpoffice/phpexcel": "1.8.1"
    ...
}
```

After adding above in `composer.json`, install the newly added library and update all the dependency versions for the current project with `composer update`:

```bash
$ composer update
```

Once new project's dependency is installed we can start working with PHPExcel.

## Example

After `composer update` command is complete, create a new file named `create_excel.php` at the project root. `composer.json` and newly created file should be on the same level in the project root. In `create_excel.php` file paste the below sample code snippet. After that browse the php page in the browser. This will create a new excel sheet `create_excel.xlsx` in the same folder where `create_excel.php` is.

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

Refer to the latest version of [PHPExcel on Github] to learn more.

## Resources

Learn more:

* Read and Write Microsoft Excel Files in PHP: [Part 1](http://www.phpclasses.org/blog/post/322-Read-and-Write-Microsoft-Excel-Files-in-PHP-Part-1-Reading-XLS-files-for-Download.html), and [Part 2](http://www.phpclasses.org/blog/post/324-Read-and-Write-Microsoft-Excel-Files-in-PHP-Part-2-Writing-XLS-files.html).


[PHPExcel]: http://phpexcel.codeplex.com/
[PHPExcel on Github]: https://github.com/PHPOffice/PHPExcel
