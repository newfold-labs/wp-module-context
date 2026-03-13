# Integration

## How host plugins use context

Host plugins (e.g. Bluehost WordPress Plugin) depend on wp-module-context and set context early so modules and the admin app can read it.

1. **Set context on `newfold/context/set`** – This action runs on `plugins_loaded` at priority 1. The host (and this package) hook into it to call `setContext( $name, $value )`. Typical keys:
   - `brand.name` – e.g. `bluehost`, `hostgator`
   - `brand.sub` – optional sub-brand
   - `brand.region` – optional region
   - `platform` – set by this package: `default` or `atomic` (when `IS_ATOMIC` is true)

2. **Read context** – Any code can call `getContext( 'brand.name' )` or use the `Brand` class for `base()`, `sub()`, `region()`. The admin app receives context via the `newfold_runtime` filter: the package merges `context => Context::all()` into the runtime array.

## Bootstrap order

- `plugins_loaded` priority 1: `do_action( 'newfold/context/set' )` runs. Set all context here so it is available before module registration (which often happens later on `plugins_loaded`).

## Hooks

- **Action `newfold/context/set`** – Run context setup (e.g. `setContext( 'brand.name', 'bluehost' )`). Fired from `bootstrap.php` on `plugins_loaded` at priority 1.
- **Filter `newfold_runtime`** – This package merges `context => Context::all()` into the runtime array so the React app can read brand and platform.

## Brand class

`NewfoldLabs\WP\Context\Brand` provides:

- `base()` – `getContext( 'brand.name' )`
- `sub()` – `getContext( 'brand.sub' )`
- `region()` – `getContext( 'brand.region' )`

Use when you need a simple API for brand keys.
