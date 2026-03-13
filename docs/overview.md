# Overview

## What the module does

**wp-module-context** provides a shared context store for Newfold WordPress brand plugins. It is used to determine brand and platform so other modules and the host can branch behavior (e.g. bluehost vs bluehost-cloud on Atomic, or different marketplace brands).

- **Context store:** Static key/value store with dot-notation support (e.g. `brand.name`, `platform`). Set via `setContext( $name, $value )`, read via `getContext( $name, $default )`.
- **Hook:** On `plugins_loaded` (priority 1), the action `newfold/context/set` runs. Host plugins hook there to set `brand.name`, etc.; this package also sets `platform` (e.g. `atomic` when `IS_ATOMIC` is true).
- **Runtime:** Context is merged into the admin runtime via the `newfold_runtime` filter so the React app can read brand/platform.

## Who maintains it

- **Newfold Labs** (Newfold Digital). Distributed via Newfold Satis and used by all Newfold WordPress brand plugins.

## High-level features

- Dot-notation get/set for context (uses `WP_Forge\Helpers\dataGet` / `dataSet`).
- **Brand** helper class for `brand.name`, `brand.sub`, `brand.region`.
- Platform detection (default vs atomic) and exposure in runtime.
