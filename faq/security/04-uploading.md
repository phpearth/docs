---
title: "How to securely upload files with PHP?"
read_time: "2 min"
updated: "October 25, 20015"
group: "security"
permalink: "/faq/security/uploading-files/"

compass:
  prev: "/faq/security/sql-injection/"
  next: "/faq/testing/index.html"
---

Quite problematic can be uploading files with PHP. If you can, check if it is really needed in the first place and avoid it. Otherwise make sure to implement all kinds of validations for security measures and understand what can go wrong:

* Store files in a publicly unaccessible folder

* Renaming file

Renaming file is recommended but you might need the original file name. You can store file name into database.

* Checking file type

Instead of relying on file extension, you can get a Mime Type of a file with [finfo_file()](http://www.php.net/manual/en/function.finfo-file.php):

```php
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
echo finfo_file($finfo, $filename);
finfo_close($finfo);
```

For images more reliable check in PHP is with `getimagesize()` function:

```php
$size = @getimagesize($filename);
if (empty($size) || ($size[0] === 0) || ($size[1] === 0)) {
    throw new \Exception('Image size is not set.');
}
```

* Checking file size

## Example

Let's take all of the above into consideration and look at some very simple example:

```html
<form method="post" enctype="multipart/form-data" action="upload.php">
    File: <input type="file" name="upload">
    <input type='submit'>
</form>
```

```php
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
