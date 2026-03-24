---
name: wp-module-context
title: Dependencies
description: Composer and npm dependencies.
updated: 2025-03-18
---

# Dependencies

Main Composer dependencies and how they are used. Dev tooling is summarized only.

## Runtime

| Package | Purpose |
|---------|---------|
| **wp-forge/helpers** | `dataGet()` and `dataSet()` for dot-notation access to the context array in `Context::get()` and `Context::set()`. |

## Dev

- **newfold-labs/wp-php-standards** – PHPCS rules and config.
- **johnpbloch/wordpress** – WordPress core for WPUnit tests.
- **lucatume/wp-browser** – Codeception and WPUnit.
- **phpunit/phpcov** – Coverage merge and HTML report.
