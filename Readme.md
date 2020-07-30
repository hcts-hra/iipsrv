[![GPLv3 Licensed](https://img.shields.io/badge/license-GPLv3-blue.svg)](https://www.gnu.org/copyleft/gpl.html) [![Build Status](https://travis-ci.com/exc-asia-and-europe/iipsrv.svg?branch=master)](https://travis-ci.com/exc-asia-and-europe/iipsrv)

# About
This repository contains the docker container of our IIIF server user by the Early Chinese Periodicals Online [ECPO](https://uni-heidelberg.de/ecpo/).

iipsrv was developed by [ruven/iipsrv](https://github.com/ruven/iipsrv), the BASE image for our implementation is by [dfukagaw28/iipsrv](https://github.com/dfukagaw28/iipsrv).

## Usage
Pull the image to start the container.
```bash
docker pull hra1/iipsrv:latest
docker run  -p 8000:80 hra1/iipsrv:latest
```

Alternatively, build the image from source:
```bash
cd exc-asia-and-europe/iipsrv
docker build .
docker run  -p 8000:80 <ID-REPORTED-BY-BUILD>
```

You should be able to visit the working IIIF server at `localhost:8000`

### Test

a simple `php` test files and accompanying test image are part of these docker images, you can visit: `localhost:8000/` to see the working server and [this page](http://localhost:8000/cgi-bin/fcgi-bin/iipsrv.fcgi?IIIF=imageStorage%2Fecpo_new%2Fimage2.tif%2Ffull%2F!648,390/0/default.jpg) for a sample image.

to execute the test suite (written in [bats](https://github.com/bats-core/bats-core)) simple call:

```bash
bats test/*.bats
```

Gotcha: To run the tests the `default.jpg` test images retrieved as part of a normal test run must not be present on the filesystem, e.g. from a previous manual run of the test. Some IDEs hide ignored files by default.

### Using a Persistent Volume
We recommend separating the data and server application by mapping a docker volume.
1.   Create a data directory on your disk, e.g. `~/data/ecpo/`
1.   Copy images into this folder.
     ```bash
     docker run -d -p 8000:80 -v ~/data/ecpo/ hra1/iipsrv
     ```

## Build Arguments and Configuration Option
We are currently using the default iipsrv configuration setting, the matching configuration file is located in `src/lighttpd/lighttpd.conf`.
