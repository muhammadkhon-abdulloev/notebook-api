# Notebook API v1. Technical project for Future PHP developer position.

## [About position and task](https://github.com/muhammadkhon-abdulloev/notebook-api/blob/main/Technical.md "Technical requirements")

## Requirements
- Laravel v.8+
- PHP 8+

For running OpenAPI docs first you need to install and configure  [this](https://github.com/DarkaOnLine/L5-Swagger/wiki/Installation-&-Configuration "this") package.

------------

Available endpoints:
```
GET /api/v1/notebook/
POST /api/v1/notebook/
GET /api/v1/notebook/<id>/
POST /api/v1/notebook/<id>/
DELETE /api/v1/notebook/<id>/
```

OpenAPI documents url:
[![](https://github.com/muhammadkhon-abdulloev/notebook-api/blob/main/image_2022-05-26_19-56-37.png)](https://github.com/muhammadkhon-abdulloev/notebook-api/blob/main/image_2022-05-26_19-56-37.png)


All API methods realized in
```php
app\Http\Controllers\Api\v1
```
