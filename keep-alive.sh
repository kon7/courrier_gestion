#!/bin/bash

# Remplace cette URL par celle de ton serveur Render
URL="https://sgc-q0lb.onrender.com"

while true; do
    echo "Ping à $URL"
    curl -s $URL > /dev/null
    sleep 600  # 600 secondes = 10 minutes
done
