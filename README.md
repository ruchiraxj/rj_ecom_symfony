# Setup Instructions

### Prerequisite

1. Install PHP 7.2.5 or higher and these PHP extensions (which are installed and enabled by default in most PHP 7 installations): Ctype, iconv, JSON, PCRE, Session, SimpleXML, and Tokenizer;
2. Install Composer, which is used to install PHP packages.
3. Apache web server
4. PHP and Mysql/MariaDB

### Insallation Steps
1. Go the installed folder and execute the command "composer install"
2. create a Database "rj_book_store"
3. Open .env file and change the DATABASE_URL accordingly
4. Run command "php bin/console doctrine:migration:migrate" to migrate the necessary tables and data

### Special Notes
1. For discounts, use below codes.
###### Code = 111 Discount: 10%
###### Code = 222 Discount: 20%
###### Code = 333 Discount: 30%
