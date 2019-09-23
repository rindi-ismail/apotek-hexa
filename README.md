# apotek-hexa

## Run Environment With Laradock

Clone forked Laradock to same directory with this project

```shell
git clone git@github.com:rindi-ismail/laradock.git
```

Run the containers
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
