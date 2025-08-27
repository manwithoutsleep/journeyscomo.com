# Prompt

We're making this website responsive. All of the pages look very good, but the header and navigation do not scale properly. Also, the header and navigation are implemented individually on each page. I'd like to work with you to develop a plan to do three things:

1. Create reusable header and navigation elements for all pages on this website.
2. Update the header to look good on small screens.
3. Update the navigation to use a fly-out menu on small screens.

Do not make any changes to the code until we have agreed on a plan.

# Plan

Here's the plan:

   1. Create Reusable Header and Navigation:
       * I will create two new HTML partials: partials/_header.html and partials/_navigation.html.
       * I will extract the existing header and navigation HTML from index.html (as a representative page) into these new partials.
       * I will then add a JavaScript snippet to each HTML page (e.g., index.html, contactus.html, etc.) that uses fetch to load the content of _header.html and _navigation.html into designated placeholder div elements. This will ensure consistency and reusability across all pages.

   2. Update Header for Small Screens:
       * I will analyze the current header's CSS in css/main.css and sass/styles.scss.
       * I will add CSS media queries to sass/styles.scss (and recompile to sass/styles.css) to adjust the header's layout, font sizes, and spacing for screens smaller than a certain breakpoint (e.g., 768px), ensuring it looks good and is readable.

   3. Update Navigation for Small Screens (Fly-out Menu):
       * I will modify partials/_navigation.html to include a "hamburger" icon button.
       * I will add CSS to sass/styles.scss using media queries to:
           * Hide the standard navigation links on small screens.
           * Display and style the hamburger icon.
           * Style the fly-out menu (initially hidden, positioned off-screen).
       * I will create a new JavaScript file, js/navigation.js, to:
           * Toggle a CSS class (e.g., nav-open) on the navigation element when the hamburger icon is clicked.
           * This class will trigger the fly-out menu's visibility and animation via CSS transitions.
