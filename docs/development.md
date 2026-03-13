# Development

## Linting

- **PHP:** `composer run lint` (PHPCS), `composer run fix` (PHPCBF). Uses `phpcs.xml` and `newfold-labs/wp-php-standards`.

## Testing

- **WPUnit (Codeception):** `composer run test` runs the `wpunit` suite.
- **Coverage:** `composer run test-coverage`; then open `tests/_output/html/index.html`.

## Day-to-day workflow

1. Make changes in `includes/` or `bootstrap.php`.
2. Run `composer run lint` and `composer run test` before committing.
3. When adding or changing the public API or hooks, update [integration.md](integration.md) and [overview.md](overview.md) as needed.

## Version and release

This package is versioned and released to the Newfold Satis repository. When cutting a release, update **docs/changelog.md** with the changes for that version.
