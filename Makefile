PUBLIC_PATH=$(CURDIR)/public

APP_PATH=$(PUBLIC_PATH)/local
VENDOR_PATH=$(APP_PATH)/vendor

COMPOSER_URL=https://getcomposer.org/composer.phar

composer-get:
	cd $(APP_PATH); \
	wget $(COMPOSER_URL);

composer-install:
	cd $(APP_PATH); \
	php composer.phar install --no-dev;

composer-update:
	cd $(APP_PATH); \
	php composer.phar update --no-dev;