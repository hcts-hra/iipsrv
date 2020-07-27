# Simple smoke tests for the IIIP server for ecpo
# Focusing on URl resolution

@test "Building the image should not create an error" {
  run docker run  -p 8000:80 hra1/iipsrv:latest
  # Initialisation Complete.
  [ "$status" -eq 0 ]
}
