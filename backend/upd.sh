#!/bin/bash
imageName=backend:last
containerName=backend-container

docker build -t $imageName -f Dockerfile  .

echo Delete old container...
docker rm -f $containerName

echo Run new container...
docker run -p 4000:8080 --name $containerName $imageName