# Building Images

Images are automatically build on [Docker Hub](https://hub.docker.com/r/phpearth/php/).

Docker Cloud and therefore Docker Hub also provides
[overriding and customization](https://docs.docker.com/docker-cloud/builds/advanced/)
of various commands when building images automatically.

There are some hooks defined in the `docker/hooks` folder of these images:

* `hooks/build` - executed when building image
* `hooks/post_push` - executed after building image, used to push additional tags
  to Docker Hub.

## Labels

[Labels](https://docs.docker.com/engine/userguide/labels-custom-metadata/) are
neat way to expose additional metadata about particular Docker object. We use
[Label Schema](http://label-schema.org/) when defining image labels:

* `build-date` - Date and time of the build. Defined as
  `org.label-schema.build-date=$BUILD_DATE`, where `$BUILD_DATE` is set dynamically
  via above `hooks/build` script
* `vcs-url` - Repository location on GitHub. Defined as
  `org.label-schema.vcs-url="https://github.com/php-earth/docker-php.git"`
* `vcs-ref` - Reference to commit in Git repository
* `schema-version` - Version of the Label Schema in use.
* `vendor` - Vendor name of the image creators.
* `name`
* `description`
* `url`
