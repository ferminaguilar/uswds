# Indian Affairs Subtheme

A clean-slate Drupal 11 subtheme based on `uswds_base` with USWDS 3 and Sass compiling.

## Theme Architecture

- **Sass Entry Point:** `sass/styles.scss`
- **USWDS Theme Settings & Overrides:** `sass/_uswds-theme.scss`
- **Custom Project Styles:** `sass/_uswds-theme-custom-styles.scss`
- **Compiled CSS:** `css/styles.css`
- **Copied Assets (Fonts, Images, JS):** `assets/uswds/`

## Development Workflow

Inside `web/themes/custom/indian_affairs/`:

### 1. Compile Sass
```bash
npm run compile
```

### 2. Watch for Changes (Auto-compile during theme development)
```bash
npm run watch
```

### 3. Update / Refresh USWDS Assets
```bash
npm run copy-assets
```

### 4. Full Build (Assets + Compile)
```bash
npm run build
```

## Structure
- `config/install/` - Default theme settings
- `config/optional/` - Theme-specific block layout configurations
- `config/schema/` - Theme configuration schema
- `templates/` - Twig template overrides (copy from `web/themes/contrib/uswds_base/templates/` as needed)
