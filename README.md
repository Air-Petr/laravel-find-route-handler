# 🔍 Laravel Route Handler Finder

An Artisan command to find the handler (controller or closure) behind any route in your Laravel application.

## 📦 Installation

```bash
composer require air-petr/laravel-route-handler-finder --dev
```

If you're not using Laravel Package Auto-Discovery, you may need to manually register the service provider:

```php
// config/app.php
'providers' => [
    // ...
    AirPetr\RouteHandlerFinder\RouteHandlerFinderServiceProvider::class,
],
```

## 🚀 Usage

Use the `route:find-handler` command to locate the code behind a specific route.

```bash
php artisan route:find-handler GET /hello
```

### Output example:

```
[✔] Handler found: App\Http\Controllers\HelloController@index
```

Or, for a route with a closure:

```
[✔] Handler found in routes/web.php on line 42
```

## 🛠 Supported Features

- ✅ Supports `GET`, `POST`, `PUT`, `DELETE`, and other HTTP methods
- ✅ Works with route closures and controller actions
- ✅ Supports route groups and middleware

## 🥪 Testing

```bash
vendor/bin/phpunit
```

## 🙌 Contributing

Contributions are welcome! Feel free to submit issues or pull requests.

## 📄 License

MIT

