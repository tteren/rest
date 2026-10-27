# Slim servis iskeleti

PHP 8.4.27 ve Slim Framework 4.15.3 ile hazırlanmış yalın servis uygulaması.
`vendor/` klasöründe Slim ve çalışma zamanı bağımlılıklarının tamamı bulunur;
hedef sunucuda Composer veya internet bağlantısı gerekmez.

## Dahil edilen paket sürümleri

- `slim/slim` 4.15.3
- `slim/psr7` 1.8.0
- `nikic/fast-route` 1.3.1
- `psr/container` 2.0.2
- `psr/http-factory` 1.1.0
- `psr/http-message` 2.0
- `psr/http-server-handler` 1.0.2
- `psr/http-server-middleware` 1.0.2
- `psr/log` 3.0.2
- `fig/http-message-util` 1.1.5
- `ralouphie/getallheaders` 3.0.3

## Sunucuya aktarım ve çalıştırma

Projeyi `vendor/` klasörü dahil sunucuya kopyalayın. PHP 8.4.27 veya üstü ve
`ext-json` etkin olmalıdır. Uygulama kök dizininde şu komutu çalıştırın:

```sh
php -S 127.0.0.1:8080 -t public public/index.php
```

Web sunucusu kullanırken document root olarak `public/` dizinini ayarlayın ve
mevcut dosya olmayan istekleri `public/index.php` dosyasına yönlendirin.

## Servisler

- `GET /health` — sağlık kontrolü
- `GET /api/hello/{name}` — örnek JSON yanıtı
- `POST /api/echo` — JSON istek gövdesini geri döndürür

Geliştirme sırasında ayrıntılı hata yanıtlarını etkinleştirmek için
`APP_DEBUG=1` ayarlanabilir. Üretim ortamında bu değişkeni ayarlamayın.

Paketlerin lisans bilgileri ilgili `vendor/` alt klasörlerindeki `LICENSE` veya
`LICENSE.md` dosyalarındadır.
