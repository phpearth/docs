---
title: "How to Securely Upload Files With PHP?"
updated: "August 20, 2016"
permalink: "/faq/security/uploading-files/"
---

Uploading files in PHP is achieved with
[move_uploaded_file()](http://php.net/manual/en/function.move-uploaded-file.php)
function.

The HTML form for uploading single or multiple files must include the
`enctype="multipart/form-data"` attribute. Use POST method:

```html
<form method="post" enctype="multipart/form-data" action="upload.php">
    File: <input type="file" name="upload">
    <input type="submit">
</form>
```

And the PHP `upload.php` script looks like the following:

```php
<?php

foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["pictures"]["name"][$key]);
        move_uploaded_file($tmp_name, "/uploads/$name");
    }
}
```

Don't stop here just yet and **continue reading**! The uploaded files must be
validated for security purposes. A lot of hacks can happen with not secured
uploading. Imagine malicious attacker uploads `evil.php` which is publicly
accessible over `https://example.com/uploads/evil.php`.

If you can, check if the uplading is really needed in the first place and avoid
it. Otherwise make sure to implement all the validations for security measures
and understand the security vulnerabilities.

## Client Side Validation

For better user experience HTML offers
[accept](https://developer.mozilla.org/en/docs/Web/HTML/Element/input) attribute
to limit the file types by the extension or Mime type in the HTML, so user can
see the validation errors on the fly and selects only allowed types of files in
their browser. However browser support is
[limited](http://caniuse.com/#feat=input-file-accept) at the time of this writing.

## Server Side Validation

This is the most important validation. Client side validation can be bypassed in
no time by hackers.

### General Advice

* Store uploaded files in a publicly unaccessible folder
* Rename uploaded files

    Renaming file is recommended but you might need the original file name. You
    can store the file name in database.

* Check file type

    Instead of relying on file extension, you can get a Mime Type of a file with
    [finfo_file()](http://www.php.net/manual/en/function.finfo-file.php):

```php?start_inline=1
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
echo finfo_file($finfo, $filename);
finfo_close($finfo);
```

For images more reliable check in PHP is with `getimagesize()` function:

```php?start_inline=1
$size = @getimagesize($filename);
if (empty($size) || ($size[0] === 0) || ($size[1] === 0)) {
    throw new \Exception('Image size is not set.');
}
```

* Check file size

## Example

Let's take all of the above into consideration and look at some very simple
example.

```php?start_inline=1
// check if we have file upload
if (isset($_FILES['upload']) && $_FILES['upload']['error'] == UPLOAD_ERR_OK) {
    // Be sure we're dealing with an upload
    if (is_uploaded_file($_FILES['upload']['tmp_file']) === false) {
        throw new \Exception('Error on upload: invalid file definition');
    }

    // Generate a randomized name and append the previous extension
    $uploadName = $_FILES['upload']['name'];
    $ext = substr($uploadName, strrpos($uploadName, '.')+1, strlen($uploadName));

    $characterSet = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
    $length = 15;
    $filename = '';

    for ($i=0; $i<$length; $i++) {
        $filename .= $characterSet[mt_rand(0, count($characterSet)-1)];
    }

    $filename .= '.'.$ext;

    move_uploaded_file($_FILES['upload']['tmp_file'], __DIR__.'../uploads/'.$filename);
    // Insert it into our tracking along with the original name
```

## See Also

* [How to Securely Allow Users to Upload Files](https://paragonie.com/blog/2015/10/how-securely-allow-users-upload-files)
* [Related FAQ: How to Increase the File Upload Size in PHP?](/faq/how-to-increase-upload-size-in-php/)
* [PHP Manual: Handling file uploads](http://php.net/manual/en/features.file-upload.php)
* [brandonsavage/Upload](https://github.com/brandonsavage/Upload) - standalone PHP upload component with validation and storage strategies.
