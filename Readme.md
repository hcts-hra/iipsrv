[![GPLv3 Licensed](https://img.shields.io/badge/license-GPLv3-blue.svg)](https://www.gnu.org/copyleft/gpl.html)

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

`php` test files are part of these images, you can visit: `localhost:8000/` to see the working test.

```bash
TODO
```

### Using a Persistent Volume
We recommend separating the data and server application by mapping a docker volume.
1.   Create a data directory on your disk, e.g. `~/data/ecpo/`
1.   Copy images into this folder.
     ```bash
     docker run -d -p 8000:80 -v ~/data/ecpo/ hra1/iipsrv
     ```

## Build Arguments and Configuration Option
TODO
