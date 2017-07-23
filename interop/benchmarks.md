# Performance benchmarks and load testing

Benchmarking your application is important to see how the application performs
under heavier traffic and load.

## Apache HTTP server benchmarking tool

Very common benchmarking tool you can use is [ab](https://httpd.apache.org/docs/2.4/programs/ab.html).

```bash
ab -c 10 -n 1000 http://localhost/
```

### Authentication

Stage and beta environments can be sometimes closed for public with HTTP authentication.
To pass username and password:

```bash
ab -c 10 -n 1000 -A username:password http://beta.example.org/
```

## Siege

[Siege](https://www.joedog.org/siege-home/) is an http load testing and
benchmarking tool. Its source code is available on [GitHub](https://github.com/JoeDog/siege).

```bash
siege -c 10 -r 100 -b -i http://localhost
```

## JMeter

[Apache JMeter](http://jmeter.apache.org/) is a more feature rich load tester.

## Gatling

[Gatling](http://gatling.io) is a load tester with GUI.

## HTTP keep-alive

[HTTP keep-alive](https://en.wikipedia.org/wiki/HTTP_persistent_connection) or
HTTP persistent connections greatly improve performance. In performance testing
you can enable them and get better results, however these vary from one testing
software to another. Good practice is to disable them and get comparable results
among the above tests.
