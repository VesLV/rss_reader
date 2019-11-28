Rss_reader
Setup:
1) git clone https://github.com/VesLV/rss_reader
2) composer install
3) yarn install
4) symfony serve

Open in browser - http://127.0.0.1:8000

In case using any apache tools for hosting skip 4th command make corrections in .env file for DB connections and run - php bin/console doctrine:migrations:migrate
