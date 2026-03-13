# Getting started

## Prerequisites

- **PHP** 7.3+ (see `composer.json` platform).
- **Composer** for dependencies.
- **Git** for the repository.

## Install

From the package root:

```bash
composer install
```

## Run tests

```bash
composer run test
```

Uses Codeception with the `wpunit` suite. For coverage:

```bash
composer run test-coverage
```

Then open `tests/_output/html/index.html` to view the report.

## Lint

```bash
composer run lint
composer run fix
```

Uses PHPCS with the repo’s `phpcs.xml`. Requires `newfold-labs/wp-php-standards` (dev dependency).

## Using context in a host plugin

1. Depend on `newfold-labs/wp-module-context` via Composer.
2. On the `newfold/context/set` action, call `setContext( 'brand.name', 'bluehost' )` (and any other keys).
3. Other modules and the runtime will read context via `getContext()` or the `newfold_runtime` filter.

See [integration.md](integration.md) for details.
