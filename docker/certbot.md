# Certbot

[Certbot](https://certbot.eff.org/) is a tool for automatic management of
[Let's Encrypt](https://letsencrypt.org/) certificates.

## How to use the Certbot with Docker?

There is an official image [certbot/certbot](https://hub.docker.com/r/certbot/certbot/)
available on Docker Hub.

Let's go through some of the possible usage examples.

### Running the certbot command in a container

The usual and simplest way to run certbot commands is the following:

```bash
docker run -it --rm -p 80:80 -p 443:443 --name certbot \
    -v "/etc/letsencrypt:/etc/letsencrypt" \
    -v "/var/lib/letsencrypt:/var/lib/letsencrypt" \
    certbot/certbot certonly
```

By attaching volumes from the host machine, certbot can store the required
certificate files for further usage.

### Using Docker Compose

Add the Certbot image to `docker-compose.yml`:

```yaml
version: '3.3'
services:
  certbot:
    container_name: certbot
    image: certbot/certbot
    volumes:
      - certbot-data:/etc/letsencrypt
    ports:
      - 80
      - 443
volumes:
  certbot-data:
    external: true
```

And then run the following example:

```bash
docker-compose run --rm certbot certonly --rsa-key-size 4096 --standalone -d example.com -d www.example.com
```

Usually you'll have more services defined in your `docker-compose.yml` and you
won't need certbot all the time in current project. Therefore you can use multiple
docker compose files:

`docker-compose.yml`:

```yaml
version: '3.3'
services:
  app:
    # ...
  db:
    # ...
volumes:
  certbot-data:
    external: true
```

`docker-compose.certbot.yml`:

```yaml
version: '3.3'
services:
  certbot:
    container_name: certbot
    image: certbot/certbot
    volumes:
      - certbot-data:/etc/letsencrypt
    ports:
      - 80
      - 443
volumes:
  certbot-data:
    external: true
```

```bash
docker-compose -f docker-compose.yml -f docker-compose.certbot.yml \
    run --rm certbot certonly --rsa-key-size 4096 --standalone -d example.com -d www.example.com
```

## DNS challenge

Before running certbot command in a container, create a Docker volume where the
Let's Encrypt files will be stored:

```
docker volume create --name certbot-data
```

Then obtain the certificate with the following:

```bash
docker run -it --rm -p 443:443 -p 80:80 --name certbot \
    -v certbot-data:/etc/letsencrypt
    certbot/certbot certbot certonly \
        --manual --preferred-challenges dns \
        -d example.com -d www.example.com --rsa-key-size 4096
```

You'll be prompted if you agree to log the IP running the certbot command and to
create two DNS TXT records: `_acme-challenge.example.com` and
`_acme-challenge.www.example.com` with provided strings.

## Configuring server

Downside of using Certbot with Docker is that automatic server configuration is
not possible and you'll need to do that manually, which shouldn't be much of a
problem if you want more control on the server and set proper security headers
and other settings.

To configure web-server you can also use the
[Mozilla SSL Configuration Generator](https://mozilla.github.io/server-side-tls/ssl-config-generator/).

## See also

* [Multiple Docker Compose files](https://docs.docker.com/compose/extends/)
