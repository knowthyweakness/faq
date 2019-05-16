# faq

To run the FAQ project:

1. git clone https://github.com/knowthyweakness/faq.git
2. cd into FAQ and run composer install
3. cp .env.example to .env
4. run: php artisan key:generate
5. setup database / with sqlite or other https://laravel.com/docs/5.6/database
6. Run: php artisan migrate
7. Run: unit tests: phpunit
8. Run: seeds php artisan migrate:refresh --seed

# Add-on Feature Epic
Users will have the ability to create small notes for themselves. If the user is not ready to put an answer, he or she can use the notes to write down his or thoughts. If they want to start their post they will have the ability to write a draft before submission. The beauty of this feature is that everything is stored on the server so they can pick up and write as they please.