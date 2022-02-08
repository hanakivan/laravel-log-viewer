## Laravel Log Viewer
A simple package to view laravel log files in browser. Safely and securely!


## How to use
1. install the package
```
composer require hanakivan/laravel-log-viewer
```
2. add a service provider to the config file to the list of service providers
```
\hanakivan\LaravelLogViewer\LaravelLogViewerServiceProvider::class,
```
3. set into your `.env` file the required configuration options
5. That's it

### `.env` required confguration
- enable the log viewer `hanakivan.laravellogviewer.isenabled=true`
- set some random and unguessable prefix to access the log viewer, for example: `hanakivan.laravellogviewer.routeprefix=themostunsecureprefixevet`
- run `php artisan serve` and access `http://127.0.0.1:8000/themostunsecureprefixevet/logviewer`

### Gotchas
- when running a production environment use `php artisan route:cache` to refresh routes everytime you configure the plugin


## Requires
- Laravel >= 8.0
- php >= 8.0

Will probably work with older versions, but untested.

## Licensing
👉 [See license](LICENSE.md)


## Credits
- This package has been made thanks to the following tutorial: https://devdojo.com/devdojo/how-to-create-a-laravel-package
