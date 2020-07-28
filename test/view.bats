# Simple smoke tests for the IIIP server for ecpo
# Focusing on URl resolution


@test "Check server landing page" {
  run curl localhost:8000/
  [ "$status" -eq 0 ]

}

@test "Bad path message" {
  run wget http://localhost:8000/cgi-bin/fcgi-bin/iipsrv.fcgi?IIIF=badPath%2Fecpo_new%2Fimage2.tif%2Ffull%2F!648,390/0/default.jpg
  [ "$status" -eq 8 ]
  # echo $output
  [ "${lines[3]}" = "HTTP request sent, awaiting response... 404 Not Found" ]
}
