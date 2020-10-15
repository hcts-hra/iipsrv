FROM dfukagaw28/iipsrv:release-1.1

COPY test/*.php test/
COPY test/images/*.tif data/images/imageStorage/ecpo_new/
