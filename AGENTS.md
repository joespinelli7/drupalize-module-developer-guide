# Repository Guide

## Local Environment

- Use DDEV, not host PHP: Drupal is served from `web/` with PHP 8.3 and MariaDB 10.11. Run project commands as `ddev <command>` or `ddev exec <command>`.
- A fresh guide starting point requires the ordered restore sequence: `ddev start`, `ddev composer install`, `ddev import-db --file=backups/d11.start-here.sql.gz`, `ddev import-files --source=backups/public_files.tar.gz`, `ddev drush updatedb`, then `ddev drush cr`.
- The DDEV Selenium/Chromium add-on and browser-test environment variables are already configured in `.ddev/`; do not replace its generated `config.selenium-standalone-chrome.yaml` or `docker-compose.selenium-chrome.yaml` manually.

## Project Structure

- Treat `web/modules/custom/anytown/` as the application code. Its route, services, plugins, and templates are the guide's implementation; the `*-initial-build.php`, `*-end-of-Chap4.php`, and `src/Notes/` files are teaching references, not runtime entrypoints.
- `config/sync/` is the active Drupal configuration export (`web/sites/default/settings.php` sets it as `../config/sync`). Use Drush config import/export when changing site configuration; do not treat a database backup as an interchangeable config export.
- Drupal core and contributed dependencies under `web/core/`, `web/modules/contrib/`, and `web/themes/contrib/` are Composer-generated and ignored. Change their versions in `composer.json`/`composer.lock`, not in place.

## Verification

- Run Drupal coding standards for the custom code with `ddev exec ./vendor/bin/phpcs web/modules/custom/anytown`; `phpcs.xml` defaults to all custom modules and deliberately excludes `config/`, CSS, and JS.
- Rebuild Drupal caches with `ddev drush cr` after changing routing, services, plugins, or configuration.

## Formatting

- `.editorconfig` requires LF, spaces, two-space indentation, trimmed trailing whitespace, and final newlines; `composer.json` and `composer.lock` use four-space indentation.
