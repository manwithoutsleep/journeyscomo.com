# Journeys Christian Counseling _(journeyscomo.com)_

A simple HTML/CSS/JS website for Journeys Christian Counseling services.

## Table of Contents

- [Platforms](#platforms)
- [Usage](#usage)
- [Dependencies](#dependencies)
- [Testing](#testing)

## Platforms

Currently hosted on GoDaddy Web Hosting Plus at https://journeyscomo.com

## Usage

This is a static website built with HTML, CSS (compiled from SASS), and JavaScript. The site uses a modular component system with reusable header and navigation partials.

### Local Development

1. Open the project directory in VS Code. Press ctrl-F5 to launch the site in IIS Express.
2. Navigate to `http://localhost:13995/` in your browser
3. For SASS development, compile the SCSS files when making style changes:

```
sass sass/styles.scss sass/styles.css
```

### Project Structure

- `index.html` - Homepage
- `partials/` - Reusable HTML components (header, navigation)
- `sass/` - SASS source files and compiled CSS output
- `js/` - JavaScript functionality including component loading
- `images/` - Static assets
- Content pages: `contactus.html`, `faq.html`, `meetus.html`, `ourservices.html`, `resources.html`, etc.

## Dependencies

- SASS Compiler
- Standard web server (for local development and hosting)

## Testing

- No automated testing implemented. Manual testing via visual inspection is necessary.
- Deploy the site to https://test.journeyscomo.com for user acceptance testing.
