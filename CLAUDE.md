# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a static HTML website for Journeys Christian Counseling. The site is currently being converted from individual page-based HTML to a modular system with reusable components, specifically focusing on making it responsive.

## Architecture

**Current Structure:**
- Static HTML pages with individual implementations
- SASS/SCSS for styling (compiled to CSS)
- Vanilla JavaScript for dynamic functionality
- Reusable HTML partials system implemented for header and navigation

**Key Components:**
- `partials/_header.html` and `partials/_navigation.html` - Reusable header and navigation components loaded dynamically
- `js/navigation.js` - Handles loading of header and navigation partials via fetch API
- `sass/styles.scss` - Main SASS file with responsive design patterns and CSS variables
- `css/specs/spec-2025-08-27T16-15-responsive.md` - Current project specification for responsive design implementation

**Page Structure Pattern:**
All HTML pages follow this pattern:
```html
<div id="header-placeholder"></div>
<div id="navigation-placeholder"></div>
<!-- Page content -->
```

The JavaScript in `js/navigation.js` automatically loads the partials on `DOMContentLoaded`.

## Development Workflow

**Styling:**
- Edit SASS files in the `sass/` directory
- Main stylesheet: `sass/styles.scss`
- Variables: `sass/_variables.scss`
- Reset styles: `sass/_reset.scss`
- Compiled output goes to `sass/styles.css` (not `css/` directory)

**Responsive Design:**
- Mobile-first approach with CSS media queries
- Current breakpoints defined in SASS variables
- Header scales properly on small screens
- Navigation uses fly-out menu pattern for mobile

**JavaScript:**
- Vanilla JavaScript (no frameworks)
- Dynamic loading of HTML partials
- Files in `js/` directory serve specific purposes

## File Organization

**Core Files:**
- `index.html` - Homepage
- `partials/` - Reusable HTML components
- `sass/` - SASS source files and compiled output
- `js/` - JavaScript functionality
- `images/` - Static assets including rotator images
- `pdf/` - Resource documents

**Content Pages:**
- `contactus.html`, `faq.html`, `meetus.html`, `ourservices.html`, `resources.html`, etc.

## Current Development Focus

The project is actively being converted to a responsive design with:
1. Reusable header and navigation components ✓
2. Responsive header scaling ✓  
3. Mobile navigation with fly-out menu ✓

Refer to `css/specs/spec-2025-08-27T16-15-responsive.md` for the current implementation plan and requirements.

## Important Notes

- This is a static website (no build process or package.json)
- SASS compilation appears to be handled externally
- The `.eslintrc.json` file references Angular patterns but this is not an Angular project
- No testing framework is currently implemented
- No automated build/deployment process is in place