# WSUWP Content Syndicate - WSU Taxonomies

[![Build Status](https://travis-ci.org/washingtonstateuniversity/WSUWP-Content-Syndicate-WSU-Taxonomies.svg?branch=master)](https://travis-ci.org/washingtonstateuniversity/WSUWP-Content-Syndicate-WSU-Taxonomies)

Extends [WSUWP Content Syndicate](https://github.com/washingtonstateuniversity/WSUWP-Content-Syndicate) to support a full set of taxonomy queries. Categories, tags, and WSU's [university taxonomies](https://github.com/washingtonstateuniversity/WSU-University-Taxonomy) are supported.

## Supported taxonomies

This plugin uses WSUWP Content Syndicate's `wsuwp_content_syndicate_taxonomy_filters` filter to add support for the following taxonomies:

* Category
* Tag
* University Category
* University Organization
* University Location

## Shortcode attributes

This plugin adds the following attributes to shortcodes registered with or extended from WSUWP Content Syndicate:

* `university_category` - A comma separated list of university category slugs.
* `university_category_match` - Specify `all` if retrieved content should match all of the provided university category slugs. Defaults to match any.
* `university_organization` - A comma separated list of university organization slugs.
* `university_organization_match` - Specify `all` if retrieved content should match all of the provided organization slugs. Defaults to match any.
* `university_location` - A comma separated list of university location slugs.
* `university_location_match` - Specify `all` if retrieved content should match all of the provided location slugs. Defaults to match any.
* `category` - A comma separated list of category slugs.
* `category_match` - Specify `all` if retrieved content should match all of the provided category slugs. Defaults to match any.
* `tag` - A comma separated list of tag slugs.
* `tag_match` - Specify `all` if retrieved content should match all of the provided tag slugs. Defaults to match any.
* `taxonomy_match` -> Specify `any` if retrieved content should match any one of the provided taxonomy rules. Defaults to match all of the provided taxonomy rules.

## Combining terms and taxonomies

Taxonomy queries are built from term slugs and the match type supplied in the shortcode.

As an example, `[wsuwp_json output="headlines" category="taco,burrito"]` will pull a list of headlines for posts that are assigned either the category "taco" or the category "burrito".

Adding the `category_match` attribute changes this behavior. `[wsuwp_json output="headlines" category="taco,burrito" category_match="all"]` will pull a list of headlines for posts that are assigned both the "taco" and "burrito" categories.

Multiple taxonomies work in a similar way.

`[wsuwp_json output="headlines" category="taco,burrito" university_location="wsu-pullman"]` will pull a list of headlines for posts that are assigned the location of "wsu-pullman" and either the category "taco" or the category "burrito".

Adding the `taxonomy_match` attribute changes this behavior. `[wsuwp_json output="headlines" category="taco,burrito" university_location="wsu-pullman" taxonomy_match="any"]` will pull a list of headlines for posts that are assigned the location of "wsu-pullman" *or* have either the category "taco" or "burrito" assigned.
