# How to Securely Upload Files With PHP?

Uploading files in PHP is achieved with
[move_uploaded_file()](http://php.net/manual/en/function.move-uploaded-file.php)
function.

The HTML form for uploading single or multiple files must include the
`enctype="multipart/form-data"` attribute. Use the POST method:

```html
<form method="post" enctype="multipart/form-data" action="upload.php">
    File: <input type="file" name="pictures[]" multiple="true">
    <input type="submit">
</form>
```

And the PHP `upload.php` script looks like the following:

```php
<?php

foreach ($_FILES['pictures']['error'] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['pictures']['tmp_name'][$key];
        // basename() may prevent directory traversal attacks, but further
        // validations are required
        $name = basename($_FILES['pictures']['name'][$key]);
        move_uploaded_file($tmpName, "/var/www/project/uploads/$name");
    }
}
```

Don't stop here just yet and **continue reading**! The uploaded files must be
validated for security purposes. A lot of hacks can happen with not secured
uploading. Imagine malicious attacker uploads `evil.php` which is publicly
accessible over `https://example.com/uploads/evil.php`.

## Validation

Always make sure to implement all the server side validations for security measures
and understand the security vulnerabilities behind them.

### Directory Traversal

To avoid the directory traversal (a.k.a. path traversal) attack use `basename()`
like shown above or even better rename the file completely like in the next
step.

### Rename Uploaded Files

Renaming file avoids duplicate names in the uploaded folder and also avoids
directory traversal attacks. In case you might need the original file name, you
can store the file name in database. For example, renaming file with `microtime()`
and some random number:

```php
$uploadedName = $_FILES['upload']['name'];
$ext = strtolower(substr($uploadedName, strripos($uploadedName, '.')+1));

$filename = round(microtime(true)).mt_rand().'.'.$ext;
```

### Check File Type

Instead of relying on file extension, you can get a mime type of a file with
[finfo_file()](http://www.php.net/manual/en/function.finfo-file.php):

```php
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type  extension
echo finfo_file($finfo, $filename);
finfo_close($finfo);
```

For images more reliable but still not good enough check in PHP is with
`getimagesize()` function:

```php
$size = @getimagesize($filename);
if (empty($size) || ($size[0] === 0) || ($size[1] === 0)) {
    throw new \Exception('Image size is not set.');
}
```

### Check File Size

To limit or check the uploaded file size you can check the `$_FILES['files']['size']`
and the errors `UPLOAD_ERR_INI_SIZE` and `UPLOAD_ERR_FORM_SIZE`:

```php
if ($_FILES['pictures']['size'] > 1000000) {
    throw new RuntimeException('Exceeded filesize limit.');
}
```

### Storing Uploads to Private Location

Instead of saving uploaded files to a public location available at
`https://example.com/uploads`, storing them in a publicly unaccessible folder is
a good practice. To deliver these files so called proxy scripts are used.

### Client Side Validation

For better user experience HTML offers
[accept](https://developer.mozilla.org/en/docs/Web/HTML/Element/input) attribute
to limit the file types by the extension or mime type in the HTML, so user can
see the validation errors on the fly and selects only allowed types of files in
their browser. However browser support is
[limited](http://caniuse.com/#feat=input-file-accept) at the time of this writing.
Keep in mind that client side validation can be bypassed by hackers in no time.
Server side validation steps explained in previous steps is the more important
validation to use.

## Full Example

Let's take all of the above into consideration and look at some very simple
example:

```php
// check if we have file upload
if (isset($_FILES['upload']) && $_FILES['upload']['error'] == UPLOAD_ERR_OK) {
    // Be sure we're dealing with an upload
    if (is_uploaded_file($_FILES['upload']['tmp_file']) === false) {
        throw new \Exception('Error on upload: invalid file definition');
    }

    // Rename uploaded file
    $uploadName = $_FILES['upload']['name'];
    $ext = strtolower(substr($uploadName, strripos($uploadName, '.')+1));
    $filename = round(microtime(true)).mt_rand().'.'.$ext;

    move_uploaded_file($_FILES['upload']['tmp_file'], __DIR__.'../uploads/'.$filename);
    // Insert it into our tracking along with the original name
}
```

## Server Configuration

Server side validation mentioned above can be still bypassed by embedding custom
code inside the image itself with tools like [jhead](http://www.sentex.net/~mwandel/jhead/)
and the file might be run and interpreted as PHP.

That's why enforcing the file types should be done also on the server level.

### Apache

Make sure Apache is not configured to interpret
[multiple files as same](http://httpd.apache.org/docs/2.4/mod/mod_mime.html#multipleext).
For example, images being interpreted as PHP files. Use the
[ForceType](http://httpd.apache.org/docs/2.0/mod/core.html#forcetype) directive
to force the type on the uploaded files.

```
<FilesMatch "\.(?i:pdf)$">
    ForceType application/octet-stream
    Header set Content-Disposition attachment
</FilesMatch>
```

or in case of images:

```
ForceType application/octet-stream
<FilesMatch "(?i).jpe?g$">
    ForceType image/jpeg
</FilesMatch>
<FilesMatch "(?i).gif$">
    ForceType image/gif
</FilesMatch>
<FilesMatch "(?i).png$">
    ForceType image/png
</FilesMatch>
```

### Nginx

On Nginx you can use the rewrite rules, or use the `mime.types` configurations
file provided by default.

```
location ~* (.*\.pdf) {
    types { application/octet-stream .pdf; }
    default_type application/octet-stream;
}
```

## See Also

* [How to Securely Allow Users to Upload Files](https://paragonie.com/blog/2015/10/how-securely-allow-users-upload-files)
* [PHP Image Upload Security: How Not to Do It](http://nullcandy.com/php-image-upload-security-how-not-to-do-it/)
* [Related FAQ: How to Increase the File Upload Size in PHP?](/general/increase-file-upload-size.md)
* [PHP Manual: Handling file uploads](http://php.net/manual/en/features.file-upload.php)
* [brandonsavage/Upload](https://github.com/brandonsavage/Upload) - standalone
  PHP upload component with validation and storage strategies.
* [Uploading files with Laravel framework](https://laravel.com/docs/5.2/requests#files)
* [Uploading files with Symfony framework](http://symfony.com/doc/current/controller/upload_file.html)
* [ralouphie/mimey](https://github.com/ralouphie/mimey) - PHP package for
  converting file extensions to MIME types and vice versa.
* [Maikuolan/phpMussel](https://github.com/Maikuolan/phpMussel) - PHP-based anti-virus anti-trojan anti-malware
  solution capable of scanning file uploads and with some simple upload controls included.
