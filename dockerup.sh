#!/bin/bash
# Convenience wrapper for stopping all containers prior to running this stack
docker stop $(docker ps -aq) && docker-compose up
