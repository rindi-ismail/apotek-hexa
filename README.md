# apotek-hexa

## Run Environment With Laradock

Clone apotek-hexa and Laradock

```shell
git clone git@github.com:rindi-ismail/apotek-hexa.git
git clone git@github.com:rindi-ismail/laradock.git
```

get into laradock directory
```shell
cd laradock
```

Build and run the development environment images
```shell
docker-compose up --build nginx postgres pgadmin redis workspace
```

Build and run the development environment images as daemon (you wont see the log)
```shell
docker-compose up --build -d nginx postgres pgadmin redis workspace
```

## Local Environment Setup

eidt your hosts file 
```shell
sudo nano /etc/hosts
```

then add apotek.test next to localhost
```
127.0.0.1       localhost apotek.test
```

## Development

Get in the container (to execute laravel cli, etc)
```shell
docker-compose exec --user=laradock workspace bash
```

## Testing

Browse to http://apotek.test


## Pgadmin

Browse to http://localhost:5050


## Stop

Stop all container

```shell
docker-compose stop
```
