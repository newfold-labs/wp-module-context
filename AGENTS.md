# Agent guidance – wp-module-context

This file gives AI agents a quick orientation to the repo. For full detail, see the **docs/** directory.

## What this project is

- **wp-module-context** – Newfold module that determines context for brands and platforms (e.g. bluehost vs atomic). Host plugins run `setContext( 'brand.name', 'bluehost' )` (and similar) on the `newfold/context/set` action; this package provides a static context store, dot-notation get/set, platform detection, and exposes context on the `newfold_runtime` filter for the admin app. Maintained by Newfold Labs.

- **Stack:** PHP 7.3+. No frontend; consumed as a Composer dependency by brand plugins.

- **Architecture:** On `plugins_loaded` (priority 1) the action `newfold/context/set` runs; hosts and this package set context via `setContext()`. Platform is set to `atomic` when `IS_ATOMIC` is true. Context is merged into runtime via the `newfold_runtime` filter.

## Key paths

| Purpose | Location |
|---------|----------|
| Bootstrap | `bootstrap.php` – hooks `plugins_loaded`, `newfold/context/set`, and `newfold_runtime` |
| Context store | `includes/Context.php` – static get/set/all |
| Brand helpers | `includes/Brand.php` – dot-notation brand name/sub/region |
| Public API | `includes/functions.php` – `getContext()`, `setContext()` |
| Tests | `tests/` (Codeception wpunit) |

## Essential commands

```bash
composer install
composer run lint
composer run fix
composer run test        # codecept run wpunit
composer run test-coverage
```

## Documentation

- **Full documentation** is in **docs/**. Start with **docs/index.md**.
- **CLAUDE.md** is a symlink to this file (AGENTS.md).

---

## Keeping documentation current

**When you change code, features, or workflows, update the docs so they stay accurate.**

- Keep all docs current, not only the ones listed here.
- Prefer updating the appropriate file(s) in **docs/** over leaving docs out of date.
- When adding or changing REST routes or public API, update **api.md**. When adding or changing dependencies, update **dependencies.md**. When cutting a release, update **docs/changelog.md**.
