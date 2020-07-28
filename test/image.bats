# Simple smoke tests for the IIIP server for ecpo
# Download test images and run check its status

teardown() {
  run rm *.jpg
}

@test "Check test image at wrong URL" {
  run wget -nc -S http://localhost:8000/cgi-bin/fcgi-bin/iipsrv.fcgi?IIIF=imageStorage%2Fecpo_new%2Fimage2.tif%2Ffull%2F!648,390/0/default.jpg
  [ "$status" -eq 0 ]
  [ "${lines[4]}" = "  HTTP/1.1 200 OK" ]
  [ "${lines[6]}" = "  X-Powered-By: IIPImage" ]
  [ "${lines[9]}" = "  Content-Type: image/jpeg" ]
}
