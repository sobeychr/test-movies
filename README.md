# TEST-MOVIES
Movie review test website.
Post recently added movies, ratings, anticipation, open users...
Built upon Lumen 5.8

## Installation
1. Clone project
2. `composer install`
3. `npm i`
4. Edit `.env` accordingly
5. Edit `php.ini` accordingly
6. Add virtual host in host files

```
# /etc/hosts
127.0.0.1 test-movies
```

## Run
1. `npm run server`
2. `http://test-movies:300/`
3. `grunt asset` to build local assets
  * `grunt watch` to auto-update assets when editing

## Extra commands
* `grunt` displays the list of available Grunt tasks
* `grunt clean` to remove cache content; _usually GitIgnore_
  * **Note:** this will remove local assets, run `grunt asset` again
