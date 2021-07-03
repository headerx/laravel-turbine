.PHONY: test share build

PHP := php
COMPOSER := composer
INSTALL_CMD := laravel new
PHPUNIT := vendor/bin/phpunit

APP_NAME=laravel-turbine

BUILD_DIR := $(APP_NAME)

test:
	cd $(BUILD_DIR) && $(PHPUNIT)

share:
	cd $(BUILD_DIR) && ngrok http "localhost:8000"

build:
	$(INSTALL_CMD) $(APP_NAME)
	cp dependencies.txt $(BUILD_DIR)
	cp -prv .github $(BUILD_DIR)
	cd $(BUILD_DIR); \
	for pkg in $(shell cat dependencies.txt);\
		do $(COMPOSER) require $${pkg}; \
		done; \
		$(PHP) artisan jetstream:install livewire; \
		$(PHP) artisan vendor:publish --tag=jetstream-views -n; \
		$(PHP) artisan vendor:publish --tag=passport-migrations -n; \
		$(PHP) artisan vendor:publish --tag=fortify-migrations -n; \
		$(PHP) artisan vendor:publish --tag=jetstream-migrations -n; \
		$(PHP) artisan vendor:publish --tag=jetstream-routes -n; \
		$(PHP) artisan vendor:publish --tag=log-viewer-config -n; \
		$(PHP) artisan vendor:publish --tag=log-viewer-views -n; \
		$(PHP) artisan vendor:publish --tag=adminer -n; \
		$(PHP) artisan vendor:publish --tag=activitylog-migrations -n; \
		$(PHP) artisan vendor:publish --provider=Spatie\Permission\PermissionServiceProvider; \
		$(PHP) artisan vendor:publish --provider=Spatie\EloquentSortable\EloquentSortableServiceProvider; \
		$(PHP) artisan vendor:publish --provider="HeaderX\Iframes\IframesServiceProvider" --tag="iframes-views"; \
		$(PHP) artisan vendor:publish --provider="HeaderX\Iframes\IframesServiceProvider" --tag="iframes-config"; \
		$(PHP) artisan vendor:publish --provider="HeaderX\LegacyLoader\LegacyLoaderServiceProvider" --tag="legacy-loader-config"; \
		$(PHP) artisan vendor:publish --provider="HeaderX\BukuIcons\BukuIconsServiceProvider"; \
		$(PHP) artisan vendor:publish --provider="HeaderX\AdminerPlugin\AdminerPluginServiceProvider" --tag="adminer-plugins-config"; \
		$(PHP) artisan vendor:publish --tag=impersonate; \
		$(PHP) artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

default: test
