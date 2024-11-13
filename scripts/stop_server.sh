#!/bin/bash
REMOVE_VOLUMES=false

# Verificar si se pasó el flag --volumes
while [[ "$#" -gt 0 ]]; do
    case $1 in
        --volumes) REMOVE_VOLUMES=true ;;
        *) echo "Opción desconocida: $1"; exit 1 ;;
    esac
    shift
done

if [ "$REMOVE_VOLUMES" = true ]; then
    sudo docker compose -f docker-compose.yml down -v
else
    sudo docker compose -f docker-compose.yml down
fi
