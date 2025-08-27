# Specification

A compliant README must satisfy all the requirements listed below.

> Note: Standard Readme is designed for open source libraries. Although it's [historically](README.md#background) made for Node and npm projects, it also applies to libraries in other languages and package managers.

**Requirements:**

- Be called README (with capitalization) and have a specific extension depending on its format (`.md` for Markdown, `.org` for Org Mode Markup syntax, `.html` for HTML, ...)
- If the project supports i18n, the file must be named accordingly: `README.de.md`, where `de` is the BCP 47 Language tag. For naming, prioritize non-regional subtags for languages. If there is only one README and the language is not English, then a different language in the text is permissible without needing to specify the BCP tag: e.g., `README.md` can be in German if there is no `README.md` in another language. Where there are multiple languages, `README.md` is reserved for English.
- Be a valid file in the selected format (Markdown, Org Mode, HTML, ...).
- Sections must appear in order given below. Optional sections may be omitted.
- Sections must have the titles listed below, unless otherwise specified. If the README is in another language, the titles must be translated into that language.
- Must not contain broken links.
- If there are code examples, they should be linted in the same way as the code is linted in the rest of the project.

## Table of Contents

_Note: This is only a navigation guide for the specification, and does not define or mandate terms for any specification-compliant documents._

- [Sections](#sections)
  - [Title](#title)
  - [Short Description](#short-description)
  - [Long Description](#long-description)
  - [Table of Contents](#table-of-contents-1)
  - [Security](#security)
  - [Background](#background)
  - [Platforms](#platforms)
  - [Usage](#usage)
  - [Observability](#observability)
  - [Dependencies](#dependencies)
  - [Testing](#testing)
  - [More Info](#more-info)
  - [Extra Sections](#extra-sections)
- [Definitions](#definitions)

## Sections

### Title

**Status:** Required.

**Requirements:**

- Title must match repository, folder and package manager names - or it may have another, relevant title with the repository, folder, and package manager title next to it in italics and in parentheses. For instance:

  ```markdown
  # Standard Readme Style _(standard-readme)_
  ```

  If any of the folder, repository, or package manager names do not match, there must be a note in the [Long Description](#long-description) explaining why.

**Suggestions:**

- Should be self-evident.

### Short Description

**Status:** Required.

**Requirements:**

- Must not have its own title.
- Must be less than 120 characters.
- Must not start with `>`
- Must be on its own line.
- Must match the description in the packager manager's `description` field.
- Must match GitHub's description (if on GitHub).

**Suggestions:**

- Use [gh-description](https://github.com/RichardLitt/gh-description) to set and get GitHub description.
- Use `npm show . description` to show the description from a local [npm](https://npmjs.com) package.

### Long Description

**Status:** Optional.

**Requirements:**

- Must not have its own title.
- If any of the folder, repository, or package manager names do not match, there must be a note here as to why. See [Title section](#title).

**Suggestions:**

- If too long, consider moving to the [Background](#background) section.
- Cover the main reasons for building the repository.
- "This should describe your module in broad terms,
generally in just a few paragraphs; more detail of the module's
routines or methods, lengthy code examples, or other in-depth
material should be given in subsequent sections.

  Ideally, someone who's slightly familiar with your module should be
able to refresh their memory without hitting "page down". As your
reader continues through the document, they should receive a
progressively greater amount of knowledge."

  ~ [Kirrily "Skud" Robert, perlmodstyle](http://perldoc.perl.org/perlmodstyle.html)

### Table of Contents

**Status:** Required; optional for READMEs shorter than 100 lines.

**Requirements:**

- Must link to all sections in the file.
- Must start with the next section; do not include the title or Table of Contents headings.
- Must be at least one-depth: must capture all level two headings (e.g.: Markdown's `##` or Org Mode's `**` or HTML's `<h2>` and so on).

**Suggestions:**

- May capture third and fourth depth headings. If it is a long ToC, these are optional.

### Security

**Status**: Optional.

**Requirements:**

- May go here if it is important to highlight security concerns. Otherwise, it should be in [Extra Sections](#extra-sections).

### Background

**Status:** Optional.

**Requirements:**

- Cover motivation.
- Cover abstract dependencies.
- Cover intellectual provenance: A `See Also` section is also fitting.

### Platforms

**Status:** Required for APIs and event producers/consumers. Optional for CLI tools, NuGet packages, and other repositories that don't run in a hosted environment.

**Requirements:**

- Lists the platforms on which this service is running, including:
  - vm.lab / AzDOS
  - dev.lab / GitLab
  - Mia / GitHub

### Usage

**Status:** Required by default, optional for [documentation repositories](#definitions).

**Requirements:**

- Code block illustrating common usage.
- If CLI compatible, code block indicating common usage.
- If importable, code block indicating both import functionality and usage.

**Subsections:**

- `CLI`. Required if CLI functionality exists.
- `API`. Required if API functionality exists.
  - Describe exported functions and objects.
  - Describe request and response models.
  - Describe signatures, return types, callbacks, and events.
  - Cover types covered where not obvious.
  - Describe caveats.
  - Point to the OpenAPI spec if available.

### Observability

**Status:** Required for APIs and event producers/consumers.

**Requirements:**

- Lists and provide links to:
  - Metrics
  - Traces
  - Logs
  - Dashboards
  - Alerts

### Dependencies

**Status:** Required.

**Requirements:**

- Lists and provide links to the types of systems on which this project depends. For example:
  - SQL Databases
  - MongoDB Databases
  - RabbitMQ Message Queues
  - Redis
  - CRM Core Service
  - Encompass
  - Other services
- Since the specific connection strings will be different per hosting environment and/or Mia namespace, these details are not necessary here.

### Testing

**Status**: Required by default, optional for [documentation repositories](#definitions).

**Requirements:**

- List the projects in this solution containing unit, integration, and functional tests.
- Describe the testing process used in each of those projects.
- Mention the mocking framework used by each test project.
- Include a brief overview of test coverage.

**Suggestions:**

- None.

### Extra Sections

**Status**: Optional.

**Requirements:**

- None.

**Suggestions:**

- This should not be called `Extra Sections`. This is a space for 0 or more sections to be included, each of which must have their own titles.
- This should contain any other sections that are relevant, placed after [Usage](#usage) and before [Maintainers](#maintainers).
- Specifically, the [Security](#security) section should be here if it wasn't important enough to be placed above.

### More Info

**Status**: Optional.

**Requirements:**

- Links to other documentation if available, such as:
  - Confluence documentation
  - IcePanel diagrams
  - Miro boards

**Suggestions:**

- None.

## Definitions

_These definitions are provided to clarify any terms used above._

- **Documentation repositories**: Repositories without any functional code. For instance, [RichardLitt/knowledge](https://github.com/RichardLitt/knowledge).
