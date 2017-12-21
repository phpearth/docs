## Install Lighttpd

```bash
apk add --no-cache lighttpd
```

### Configure Lighttpd

After successful installation, create a new site specific configuration file. For
example, `/etc/lighttpd/localhost.conf`. This file can reside in any location,
but we'll use this `/etc/lighttpd` for this example.

```apacheconf
# /etc/lighttpd/localhost.conf

# Site public root folder
server.document-root = "/var/www/app/public"

# Server port
server.port = 80

# Assigning file mimetypes
mimetype.assign = (
  ".html" => "text/html",
  ".txt" => "text/plain",
  ".jpg" => "image/jpeg",
  ".png" => "image/png"
)

# Index file
index-file.names = ( "index.html" )
```

Test your configuration file:

```bash
lighttpd -t -f /etc/lighttpd/localhost.conf
```

And start webserver:

```bash
lighttpd -D -f /etc/lighttpd/localhost.conf
```
